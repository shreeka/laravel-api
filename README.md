# Laravel API project
A project to build REST API in Laravel. This project creates API resources for `customers` and `invoices` and
implements basic CRUD (Create, Read, Update, Delete) operations for them.

## Features

### Database setup 
Setup `customers` and `invoices` tables and seed them with data using custom factories and seeders.

### API endpoints
Access all the endpoints through the base URL in local environment: `http://localhost:8000/api/v1/`

#### Customers

- Retrieve all the customers (with related invoices) : `GET /api/v1/customers`
- Retrieve a customer (with related invoices):  `GET /api/v1/customers/{customer}`
- Create new customer:  `POST /api/v1/customers`, provide request body
- Update customer: `PUT /api/v1/customers/{customer}` and `PATCH /api/v1/customers/{customer}`, provide request body 
- Delete a customer : `DELETE /api/v1/customers/{customer}`

#### Invoices

- Retrieve all the invoices : `GET /api/v1/invoices`
- Retrieve an invoice :  `GET /api/v1/invoices/{invoice}`
- Bulk insert invoices:  `POST /api/v1/invoices/bulk`, provide request body (array with multiple invoices)

### Authentication
The API is safeguarded by Laravel Sanctum. In order to access the endpoints, necessary access tokens 
(`admin-token`,`update-token`,`basic-token`) needs to
be provided in the authorization header. In this application, user 'Admin' can be setup for the first time
from URL `http://localhost:8000/setup`. 

## References
[How to Build a REST API With Laravel: PHP Full Course](https://youtu.be/YGqCZjdgJJk?si=u72SkpBFxktluwBF)


    
