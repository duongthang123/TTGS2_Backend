<?php

namespace App\Repositories\SalaryCft;

use App\Models\SalaryCft;
use App\Repositories\BaseRepository;

class SalaryCftRepository extends BaseRepository
{
    protected $salaryCft;

    public function __construct(SalaryCft $salaryCft)
    {
        parent::__construct();
        $this->salaryCft = $salaryCft;
    }

    public function getModel()
    {
        return SalaryCft::class;
    }

    public function getAllSalaryCftWithDataLatest($limit, $userId = null, $search = '')
    {
        $query = $this->salaryCft
            ->newQuery()
            ->with('user');

        if ($search !== '') {
            $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where(function ($searchQuery) use ($search) {
                    $searchQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('code', 'like', "%{$search}%");
                });
            });
        }

        if ($userId !== null) {
            return $query
                ->where('user_id', $userId)
                ->orderByDesc('to_year')
                ->orderByDesc('id')
                ->paginate($limit);
        }

        return $query
            ->whereRaw(
                'id = (
                SELECT newer.id
                FROM salary_cfts AS newer
                WHERE newer.user_id = salary_cfts.user_id
                    AND newer.deleted_at IS NULL
                ORDER BY newer.to_year DESC, newer.id DESC
                LIMIT 1
                )'
            )
            ->orderByDesc('id')
            ->paginate($limit);
    }
}
