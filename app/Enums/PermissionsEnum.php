<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case ManageFeatures = 'manage_features';
    case ManageUsers = 'manage_users';
    case ManageComments = 'manage_comments';
    case UpvoteDownvote = 'upvote_downvote';

    public function label(): string
    {
        return match ($this) {
            self::ManageFeatures => 'Features Manager',
            self::ManageUsers => 'Users Manager',
            self::ManageComments => 'Comments Manager',
            self::UpvoteDownvote => 'Votes Manager',
        };
    }
}
