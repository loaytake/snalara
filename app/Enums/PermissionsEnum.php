<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case MANAGEFEATURES = 'manage_features';
    case MANAGEUSERS = 'manage_users';
    case MANAGECOMMENTS = 'manage_comments';
    case UPVOTEDOWNVOTE = 'upvote_downvote';

    public function label(): string
    {
        return match ($this) {
            self::MANAGEFEATURES => 'Features Manager',
            self::MANAGEUSERS => 'Users Manager',
            self::MANAGECOMMENTS => 'Comments Manager',
            self::UPVOTEDOWNVOTE => 'Manage Votes',
        };
    }
}
