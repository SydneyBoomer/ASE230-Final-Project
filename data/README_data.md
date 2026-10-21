# Bogr Data Files

This folder stores Bogr's persistent data in JSON files. JSON does not support comments, so this README explains what each file is for and what fields its records should contain.

## `users.json`

Stores account information and login credentials.

| Field | Description |
|---|---|
| `user_id` | Unique identifier for the user. |
| `username` | User's chosen username. |
| `email` | User's email address. |
| `password_hash` | Password hash created by PHP's `password_hash()`. Never store plain-text passwords. |
| `created_at` | Date and time the account was created. |

## `friendships.json`

Connects two users and tracks friend requests.

| Field | Description |
|---|---|
| `friendship_id` | Unique identifier for the friendship/request record. |
| `requester_id` | `user_id` of the person who sent the request. |
| `receiver_id` | `user_id` of the person who received the request. |
| `status` | Request status, such as `pending`, `accepted`, or `rejected`. |
| `created_at` | Date and time the request was created. |

Only friendships with an `accepted` status should grant access to friends-only posts.

## `posts.json`

Stores posts and identifies their authors.

| Field | Description |
|---|---|
| `post_id` | Unique identifier for the post. |
| `user_id` | `user_id` of the user who created the post. |
| `title` | Post title, if the post has one. |
| `content` | Text content of the post. |
| `image_path` | Relative path to an uploaded image, if there is one. |
| `created_at` | Date and time the post was created. |
| `updated_at` | Date and time the post was last updated. |

## `likes.json`

Tracks which users like which posts.

| Field | Description |
|---|---|
| `like_id` | Unique identifier for the like record. |
| `user_id` | `user_id` of the user who liked the post. |
| `post_id` | `post_id` of the liked post. |
| `created_at` | Date and time the like was created. |

A user should only be able to like the same post once.

## `comments.json`

Stores replies to posts.

| Field | Description |
|---|---|
| `comment_id` | Unique identifier for the comment. |
| `user_id` | `user_id` of the user who wrote the comment. |
| `post_id` | `post_id` of the post being commented on. |
| `content` | Text of the comment. |
| `created_at` | Date and time the comment was created. |

## `exampleFeed.json`

Stores the example posts for users who aren't logged in.

| Field | Description |
|---|---|
| `post_id` | Unique identifier for the post. |
| `title` | Post title, if the post has one. |
| `content` | Text content of the post. |
| `image_path` | Relative path to an uploaded image, if there is one. |
| `created_at` | Date and time the post was created. |

## JSON file guidelines

- Each data file should contain a valid JSON array, even when it has no records. An empty file should contain `[]`, not be completely blank.
- Use matching IDs to connect records across files. For example, `posts.json` uses `user_id` to identify the author in `users.json`.
- Generate unique IDs when creating records, and check existing records to avoid duplicates.
- Validate user input before saving it.
- Use PHP's `password_hash()` and `password_verify()` for passwords.
- When writing JSON from PHP, use `json_encode()` and check that reading or writing the file succeeded.
- Because JSON files do not handle simultaneous writes like a database, use file locking when updating them to reduce the risk of overwriting another request's changes.
- Do not store uploaded image data directly in these JSON files. Store the image file separately and save its relative path in `image_path`.
