# API Documentation

## Authentication

All API endpoints require authentication using Laravel Sanctum tokens.

### Login
```http
POST /api/login
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password"
}
```

**Response:**
```json
{
    "success": true,
    "token": "1|abc123...",
    "user": {
        "id": 1,
        "name": "User Name",
        "email": "user@example.com"
    }
}
```

### Logout
```http
POST /api/logout
Authorization: Bearer {token}
```

## Products

### Get All Products
```http
GET /api/products
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "nama_produk": "Sepatu Kulit Premium",
            "harga": "500000",
            "deskripsi": "Sepatu kulit berkualitas tinggi",
            "gambar": "sepatu1.jpg",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "updated_at": "2024-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Get Single Product
```http
GET /api/products/{id}
```

### Create Product (Admin Only)
```http
POST /api/products
Authorization: Bearer {admin_token}
Content-Type: multipart/form-data

nama_produk: "New Product"
harga: 100000
deskripsi: "Product description"
gambar: (file)
```

### Update Product (Admin Only)
```http
PUT /api/products/{id}
Authorization: Bearer {admin_token}
Content-Type: application/json

{
    "nama_produk": "Updated Product",
    "harga": 150000,
    "deskripsi": "Updated description"
}
```

### Delete Product (Admin Only)
```http
DELETE /api/products/{id}
Authorization: Bearer {admin_token}
```

## Orders

### Get User Orders
```http
GET /api/orders
Authorization: Bearer {token}
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "produk_id": 1,
            "jumlah": 2,
            "total_harga": "1000000",
            "phone": "081234567890",
            "alamat": "Jl. Example No. 123",
            "status": "pending",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "produk": {
                "id": 1,
                "nama_produk": "Sepatu Kulit Premium",
                "harga": "500000",
                "gambar": "sepatu1.jpg"
            }
        }
    ]
}
```

### Create Order
```http
POST /api/orders
Authorization: Bearer {token}
Content-Type: application/json

{
    "produk_id": 1,
    "jumlah": 2,
    "phone": "081234567890",
    "alamat": "Jl. Example No. 123"
}
```

### Get Single Order
```http
GET /api/orders/{id}
Authorization: Bearer {token}
```

### Update Order Status (Admin Only)
```http
PUT /api/orders/{id}/status
Authorization: Bearer {admin_token}
Content-Type: application/json

{
    "status": "processing"
}
```

## Users

### Get User Profile
```http
GET /api/user
Authorization: Bearer {token}
```

### Update User Profile
```http
PUT /api/user
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Updated Name",
    "email": "updated@example.com"
}
```

### Get All Users (Admin Only)
```http
GET /api/users
Authorization: Bearer {admin_token}
```

## Error Responses

### Validation Error
```json
{
    "success": false,
    "message": "The given data was invalid.",
    "errors": {
        "email": ["The email field is required."]
    }
}
```

### Authentication Error
```json
{
    "success": false,
    "message": "Unauthenticated."
}
```

### Authorization Error
```json
{
    "success": false,
    "message": "This action is unauthorized."
}
```

### Not Found Error
```json
{
    "success": false,
    "message": "Resource not found."
}
```

## Status Codes

- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `500` - Server Error

## Rate Limiting

API requests are limited to 60 requests per minute per authenticated user.

## Pagination

List endpoints support pagination:

```http
GET /api/products?page=2&per_page=15
```

**Response:**
```json
{
    "success": true,
    "data": [...],
    "meta": {
        "current_page": 2,
        "per_page": 15,
        "total": 100,
        "last_page": 7
    }
}
```
