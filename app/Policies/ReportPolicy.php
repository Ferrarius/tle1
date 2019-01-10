<?php

namespace App\Policies;

use App\Report;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function view(?User $user, Report $report)
    {
        return $report->is_public || ($user && $report->house->user_id == $user->id);
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Report $report)
    {
        return $report->house->user_id == $user->id;
    }

    public function delete(User $user, Report $report)
    {
        return $report->house->user_id == $user->id;
    }
}
