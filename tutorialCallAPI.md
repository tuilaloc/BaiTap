## Các table được sử dụng
- Table users
```
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(50),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

- Table shippingMethods
```
CREATE TABLE `shippingMethods` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `methodName` VARCHAR(255),
    `description` TEXT,
    `cost` DECIMAL(10, 2),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Các Models và Controllers tương ứng (Phần Restful API)
- Models: Users, Controllers: UsersController

## Các Models và Mutations tương ứng (Phần GraphQL)
- Models: ShippingMethod, Mutations: ShippingMethodMutator

## Restful API
### Lệnh này sẽ tạo ra các route RESTful cơ bản cho controller UsersController. Các route sẽ bao gồm:
- GET /api/users - Lấy danh sách tất cả người dùng
- GET /api/users/{id} - Lấy thông tin một người dùng theo ID
- POST /api/users - Tạo một người dùng mới
- PUT /api/users/{id} - Cập nhật thông tin một người dùng
- DELETE /api/users/{id} - Xóa một người dùng

## GraphQL
### Ví Dụ Về Các Truy Vấn và Mutation
- Truy vấn tất cả các phương thức vận chuyển:
query {
    shippingMethods {
        id
        methodName
        description
        cost
        created_at
        updated_at
    }
}

- Truy vấn một phương thức vận chuyển cụ thể:
query {
    shippingMethod(id: 1) {
        id
        methodName
        description
        cost
        created_at
        updated_at
    }
}

- Tạo một phương thức vận chuyển mới:
mutation {
    createShippingMethod(
        methodName: "Same Day Delivery"
        description: "Delivery on the same day."
        cost: 29.99
    ) {
        id
        methodName
        description
        cost
        created_at
        updated_at
    }
}

- Cập nhật một phương thức vận chuyển:
mutation {
    updateShippingMethod(
        id: 1
        methodName: "Updated Shipping Method"
        cost: 15.99
    ) {
        id
        methodName
        description
        cost
        created_at
        updated_at
    }
}

- Xóa một phương thức vận chuyển:
mutation {
    deleteShippingMethod(id: 1)
}