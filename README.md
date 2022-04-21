### Users

Get all users
```http
 GET /api/users
```

Get one user
```http
 GET /api/users/{id}
```

Store one user
```http
 POST /api/users
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** |
| `email` | `string` | **Required** |


Delete one user
```http
 DELETE /api/users/{id}
```

### Gifts

Get all gifts
```http
 GET /api/gifts
```

Get one gift
```http
 GET /api/gifts/{id}
```

Store one gift
```http
 POST /api/gifts
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** |
| `user_id` | `integer` | **Optional** |
| `parent_id` | `integer` | **Optional** |


Delete one gift
```http
 DELETE /api/gifts/{id}
```

