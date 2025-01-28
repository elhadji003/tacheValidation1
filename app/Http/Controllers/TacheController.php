<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TaskReceivedNotification;

class TacheController extends Controller
{
    /**
     * Affiche toutes les tâches.
     */
    public function allTaches()
    {
        $taches = Tache::with('user')->get();
        return view('pages.tasks.lesTaches', compact('taches'));
    }

    public function mesTaches()
    {
        $taches = Tache::where('user_id', auth()->id())
            ->orWhereHas('sharedUsers', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->with('user')
            ->get();

        return view('pages.tasks.mesTaches', compact('taches'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle tâche.
     */
    public function create()
    {
        return view('pages.tasks.create');
    }

    /**
     * Enregistre une nouvelle tâche dans la base de données.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tache_image' => 'nullable|image|max:2048',
            'is_complete' => 'nullable|boolean',
        ]);

        $validated['tache_image'] = null;
        if ($request->hasFile('tache_image')) {
            $validated['tache_image'] = $request->file('tache_image')->store('taches', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['is_complete'] = $request->boolean('is_complete');

        $tache = Tache::create($validated);

        // Envoyer une notification à l'utilisateur concerné
        $recipient = User::find($request->input('recipient_id')); // Ajoutez un champ "recipient_id" dans votre formulaire
        if ($recipient) {
            $recipient->notify(new TaskReceivedNotification($tache));
        }

        return to_route('taches.index')->with('success', 'Tâche créée avec succès.');
    }


    /**
     * Affiche les détails d'une tâche spécifique.
     */
    public function show(Tache $tache)
    {
        // dd($tache);
        return view('pages.tasks.show', compact('tache'));
    }

    /**
     * Affiche le formulaire pour modifier une tâche.
     */
    public function edit(Tache $tache, $id)
    {
        // $this->authorize('update', $tache);
        $tache = Tache::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('pages.tasks.edit', compact('tache'));
    }

    /**
     * Met à jour une tâche existante.
     */
    public function update(Request $request, Tache $tache, $id)
    {
        $tache = Tache::where('id', $id)->where('user_id', Auth::id())->firstOrFail();


        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tache_image' => 'nullable|image|max:2048',
            'is_complete' => 'boolean',
        ]);

        if ($request->hasFile('tache_image')) {
            $validated['tache_image'] = $request->file('tache_image')->store('taches');
        }

        $tache->update($validated);

        return to_route('taches.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    /**
     * Supprime une tâche.
     */
    public function delete(Tache $tache)
    {
        $this->authorize('delete', $tache);

        $tache->delete();

        return to_route('taches.index')->with('success', 'Tâche supprimée avec succès.');
    }

    public function showShareForm(Tache $tache)
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('pages.tasks.share', compact('tache', 'users'));
    }

    public function share(Request $request, Tache $tache)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        if (!$tache->sharedUsers()->where('user_id', $request->user_id)->exists()) {
            $tache->sharedUsers()->attach($request->user_id);
            return redirect()->route('taches.index')->with('success', 'Tâche partagée avec succès.');
        }

        return redirect()->back()->with('error', 'Cette tâche est déjà partagée avec cet utilisateur.');
    }
}
