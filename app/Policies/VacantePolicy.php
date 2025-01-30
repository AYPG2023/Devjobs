<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Por ejemplo, solo los usuarios autenticados pueden ver las vacantes
        return $user !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vacante $vacante): bool
    {
        // Por ejemplo, solo el creador de la vacante puede verla
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Por ejemplo, solo los usuarios con rol de "reclutador" pueden crear vacantes
        return $user->rol === 'reclutador';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacante $vacante): bool
    {
        // Por ejemplo, solo el creador de la vacante puede actualizarla
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante): bool
    {
        // Por ejemplo, solo el creador de la vacante puede eliminarla
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacante $vacante): bool
    {
        // Por ejemplo, solo los administradores pueden restaurar vacantes eliminadas
        return $user->rol === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacante $vacante): bool
    {
        // Por ejemplo, solo los administradores pueden eliminar vacantes permanentemente
        return $user->rol === 'admin';
    }
}