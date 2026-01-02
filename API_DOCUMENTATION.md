# REST API Documentation

## Base URL
```
http://localhost:8000/api
```

## Overview
This API provides endpoints for user authentication (login, register) and products management (CRUD operations). All protected endpoints require authentication using Bearer tokens.

## Authentication
All protected endpoints require a Bearer token in the Authorization header:
```
Authorization: Bearer {your_token_here}
```

---

## Authentication Endpoints

### 1. Register User
Create a new user account.

**Endpoint:** `POST /api/register`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**Response (201 Created):**
```json
{
  "success": true,
  "message": "User registered successfully",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2026-01-01T12:00:00.000000Z",
      "updated_at": "2026-01-01T12:00:00.000000Z"
    },
    "token": "1|abcdefghijklmnopqrstuvxyz"
  }
}
```

**Validation Errors (422):**
```json
{
  "message": "The email has already been taken.",
  "errors": {
    "email": ["The email has already been taken."]
  }
}
```

---

### 2. Login User
Authenticate a user and receive an access token.

**Endpoint:** `POST /api/login`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Login successful",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2026-01-01T12:00:00.000000Z",
      "updated_at": "2026-01-01T12:00:00.000000Z"
    },
    "token": "1|abcdefghijklmnopqrstuvxyz"
  }
}
```

**Validation Errors (422):**
```json
{
  "message": "The provided credentials are incorrect.",
  "errors": {
    "email": ["The provided credentials are incorrect."]
  }
}
```

---

### 3. Logout User (Protected)
Invalidate the current access token.

**Endpoint:** `POST /api/logout`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Logged out successfully"
}
```

---

### 4. Get Authenticated User (Protected)
Get details of the currently authenticated user.

**Endpoint:** `GET /api/user`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Response (200 OK):**
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2026-01-01T12:00:00.000000Z",
      "updated_at": "2026-01-01T12:00:00.000000Z"
    }
  }
}
```

---

## Products Endpoints

### 5. Get All Products (Protected)
Retrieve a paginated list of products with optional filtering and sorting.

**Endpoint:** `GET /api/products`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Query Parameters:**
- `page` (integer, optional): Page number (default: 1)
- `per_page` (integer, optional): Items per page (default: 15)
- `category` (string, optional): Filter by category
- `brand` (string, optional): Filter by brand
- `status` (string, optional): Filter by status (active, inactive, draft)
- `search` (string, optional): Search in name and description
- `sort_by` (string, optional): Sort field (default: created_at)
- `sort_order` (string, optional): Sort order (asc or desc, default: desc)

**Example Request:**
```
GET /api/products?category=electronics&status=active&page=1&per_page=10
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Products retrieved successfully",
  "data": {
    "data": [
      {
        "id": 1,
        "name": "Smartphone",
        "description": "Latest model smartphone",
        "price": 999.99,
        "category": "electronics",
        "brand": "Apple",
        "size": null,
        "color": "black",
        "material": null,
        "status": "active",
        "created_at": "2026-01-01T12:00:00.000000Z",
        "updated_at": "2026-01-01T12:00:00.000000Z"
      }
    ],
    "meta": {
      "total": 100,
      "count": 15,
      "per_page": 15,
      "current_page": 1,
      "total_pages": 7
    },
    "links": {
      "first": "http://localhost:8000/api/products?page=1",
      "last": "http://localhost:8000/api/products?page=7",
      "prev": null,
      "next": "http://localhost:8000/api/products?page=2"
    }
  }
}
```

---

### 6. Create Product (Protected)
Create a new product.

**Endpoint:** `POST /api/products`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Request Body:**
```json
{
  "name": "Laptop",
  "description": "High-performance laptop",
  "price": 1499.99,
  "category": "electronics",
  "brand": "Dell",
  "size": "15-inch",
  "color": "silver",
  "material": "aluminum",
  "status": "active"
}
```

**Response (201 Created):**
```json
{
  "success": true,
  "message": "Product created successfully",
  "data": {
    "id": 1,
    "name": "Laptop",
    "description": "High-performance laptop",
    "price": 1499.99,
    "category": "electronics",
    "brand": "Dell",
    "size": "15-inch",
    "color": "silver",
    "material": "aluminum",
    "status": "active",
    "created_at": "2026-01-01T12:00:00.000000Z",
    "updated_at": "2026-01-01T12:00:00.000000Z"
  }
}
```

**Validation Errors (422):**
```json
{
  "message": "The name field is required.",
  "errors": {
    "name": ["The name field is required."],
    "price": ["The price must be a number."]
  }
}
```

---

### 7. Get Single Product (Protected)
Retrieve details of a specific product.

**Endpoint:** `GET /api/products/{id}`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Product retrieved successfully",
  "data": {
    "id": 1,
    "name": "Laptop",
    "description": "High-performance laptop",
    "price": 1499.99,
    "category": "electronics",
    "brand": "Dell",
    "size": "15-inch",
    "color": "silver",
    "material": "aluminum",
    "status": "active",
    "created_at": "2026-01-01T12:00:00.000000Z",
    "updated_at": "2026-01-01T12:00:00.000000Z"
  }
}
```

**Not Found (404):**
```json
{
  "success": false,
  "message": "Product not found"
}
```

---

### 8. Update Product (Protected)
Update an existing product.

**Endpoint:** `PUT /api/products/{id}`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Request Body:**
```json
{
  "name": "Laptop Pro",
  "price": 1699.99,
  "status": "active"
}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Product updated successfully",
  "data": {
    "id": 1,
    "name": "Laptop Pro",
    "description": "High-performance laptop",
    "price": 1699.99,
    "category": "electronics",
    "brand": "Dell",
    "size": "15-inch",
    "color": "silver",
    "material": "aluminum",
    "status": "active",
    "created_at": "2026-01-01T12:00:00.000000Z",
    "updated_at": "2026-01-01T12:30:00.000000Z"
  }
}
```

**Not Found (404):**
```json
{
  "success": false,
  "message": "Product not found"
}
```

---

### 9. Delete Product (Protected)
Delete a product.

**Endpoint:** `DELETE /api/products/{id}`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Product deleted successfully"
}
```

**Not Found (404):**
```json
{
  "success": false,
  "message": "Product not found"
}
```

---

### 10. Search Products (Protected)
Search products by name, description, category, or brand.

**Endpoint:** `GET /api/products/search/{query}`

**Request Headers:**
```
Content-Type: application/json
Accept: application/json
Authorization: Bearer {your_token_here}
```

**Example Request:**
```
GET /api/products/search/laptop
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Search results retrieved successfully",
  "data": [
    {
      "id": 1,
      "name": "Laptop Pro",
      "description": "High-performance laptop",
      "price": 1699.99,
      "category": "electronics",
      "brand": "Dell",
      "size": "15-inch",
      "color": "silver",
      "material": "aluminum",
      "status": "active",
      "created_at": "2026-01-01T12:00:00.000000Z",
      "updated_at": "2026-01-01T12:30:00.000000Z"
    }
  ]
}
```

---

## Error Responses

### 401 Unauthorized
```json
{
  "message": "Unauthenticated."
}
```

### 404 Not Found
```json
{
  "success": false,
  "message": "Resource not found"
}
```

### 422 Validation Error
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "field": ["Error message"]
  }
}
```

### 500 Internal Server Error
```json
{
  "message": "Internal server error"
}
```

---

## Testing with cURL

### Register User
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

### Login User
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'
```

### Get All Products (replace TOKEN with your actual token)
```bash
curl -X GET http://localhost:8000/api/products \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer TOKEN"
```

### Create Product
```bash
curl -X POST http://localhost:8000/api/products \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer TOKEN" \
  -d '{
    "name": "New Product",
    "description": "Product description",
    "price": 99.99,
    "category": "electronics",
    "brand": "Brand Name",
    "status": "active"
  }'
```

---

## Notes
- All timestamps are in ISO 8601 format
- Price values are returned as numbers
- Use the token received from login/logout endpoints for authentication
- Tokens should be kept secure and not shared
- Tokens can be revoked by calling the logout endpoint

