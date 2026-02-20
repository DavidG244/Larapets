#!/bin/bash

# Test script para verificar que la API funciona correctamente

API_URL="http://localhost/Larapets/api"
EMAIL="david72ty@gmail.com"
PASSWORD="secret123"

echo "🧪 Testing Larapets API..."
echo ""

# Test 1: Login
echo "1️⃣ Testing Login..."
LOGIN_RESPONSE=$(curl -s -X POST "$API_URL/auth/login" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d "{\"email\":\"$EMAIL\",\"password\":\"$PASSWORD\"}")

echo "Response: $LOGIN_RESPONSE"
echo ""

# Extract token from response
TOKEN=$(echo $LOGIN_RESPONSE | grep -o '"token":"[^"]*' | cut -d'"' -f4)

if [ -z "$TOKEN" ]; then
    echo "❌ Login failed! Check credentials or server."
    exit 1
fi

echo "✅ Login successful!"
echo "Token: $TOKEN"
echo ""

# Test 2: Get authenticated user info
echo "2️⃣ Testing GET /api/auth/me..."
ME_RESPONSE=$(curl -s -X GET "$API_URL/auth/me" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Accept: application/json")

echo "Response: $ME_RESPONSE"
echo ""

# Test 3: Get all pets
echo "3️⃣ Testing GET /api/pets..."
PETS_RESPONSE=$(curl -s -X GET "$API_URL/pets" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Accept: application/json")

echo "Response: $PETS_RESPONSE"
echo ""

# Test 4: Create a new pet
echo "4️⃣ Testing POST /api/pets..."
CREATE_RESPONSE=$(curl -s -X POST "$API_URL/pets" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Test Pet",
    "kind": "Dog",
    "weight": 25.5,
    "age": 3,
    "breed": "Labrador",
    "location": "Test City",
    "description": "This is a test pet from API"
  }')

echo "Response: $CREATE_RESPONSE"
echo ""

# Extract pet ID from response
PET_ID=$(echo $CREATE_RESPONSE | grep -o '"id":[0-9]*' | cut -d':' -f2 | head -1)

if [ ! -z "$PET_ID" ]; then
    echo "✅ Pet created with ID: $PET_ID"
    echo ""
    
    # Test 5: Get specific pet
    echo "5️⃣ Testing GET /api/pets/$PET_ID..."
    PET_RESPONSE=$(curl -s -X GET "$API_URL/pets/$PET_ID" \
      -H "Authorization: Bearer $TOKEN" \
      -H "Accept: application/json")
    
    echo "Response: $PET_RESPONSE"
    echo ""
    
    # Test 6: Update pet
    echo "6️⃣ Testing PUT /api/pets/$PET_ID..."
    UPDATE_RESPONSE=$(curl -s -X PUT "$API_URL/pets/$PET_ID" \
      -H "Authorization: Bearer $TOKEN" \
      -H "Content-Type: application/json" \
      -H "Accept: application/json" \
      -d '{
        "name": "Updated Test Pet",
        "kind": "Cat",
        "weight": 5.5,
        "age": 2,
        "breed": "Persian",
        "location": "Updated City",
        "description": "Updated test pet"
      }')
    
    echo "Response: $UPDATE_RESPONSE"
    echo ""
    
    # Test 7: Delete pet
    echo "7️⃣ Testing DELETE /api/pets/$PET_ID..."
    DELETE_RESPONSE=$(curl -s -X DELETE "$API_URL/pets/$PET_ID" \
      -H "Authorization: Bearer $TOKEN" \
      -H "Accept: application/json")
    
    echo "Response: $DELETE_RESPONSE"
fi

echo ""

# Test 8: Logout
echo "8️⃣ Testing POST /api/auth/logout..."
LOGOUT_RESPONSE=$(curl -s -X POST "$API_URL/auth/logout" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Accept: application/json")

echo "Response: $LOGOUT_RESPONSE"
echo ""

echo "✅ All tests completed!"
