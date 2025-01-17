<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SuprilerController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\WarehouseController;

// Dashboard All API Route Start

// Brand Api Route Start
Route::get("/brand-list", [BrandController::class, 'BrandList'])->middleware('auth:sanctum');
Route::post("/create-brand", [BrandController::class, 'BrandCreate'])->middleware('auth:sanctum');
Route::post("/brand-by-id", [BrandController::class, 'BrandById'])->middleware('auth:sanctum');
Route::post("/update-brand", [BrandController::class, 'BrandUpdate'])->middleware('auth:sanctum');
Route::post("/delete-brand", [BrandController::class, 'BrandDelete'])->middleware('auth:sanctum');
// Brand Api Route End

// Category Api Route Start


Route::get("/product-category-data-show", [CategoryController::class, 'GetCategoriesList'])->middleware('auth:sanctum');
Route::get("/category-wish-product-data-show", [CategoryController::class, 'CategoryWishProductDataShow'])->middleware('auth:sanctum');
Route::get("/category-list", [CategoryController::class, 'CategoryList'])->middleware('auth:sanctum');
Route::post("/create-category", [CategoryController::class, 'CategoryCreate'])->middleware('auth:sanctum');
Route::post("/category-by-id", [CategoryController::class, 'CategoryByID'])->middleware('auth:sanctum');
Route::post("/update-category", [CategoryController::class, 'CategoryUpdate'])->middleware('auth:sanctum');
Route::post("delete-category", [CategoryController::class, 'CategoryDelete'])->middleware('auth:sanctum');

// Category Api Route End


//Unit  Api Route Start

Route::get("/unit-list", [UnitController::class, 'UnitList'])->middleware('auth:sanctum');
Route::post("/create-unit", [UnitController::class, 'UnitCreate'])->middleware('auth:sanctum');
Route::post("/unit-by-id", [UnitController::class, 'UnitByID'])->middleware('auth:sanctum');
Route::post("/update-unit", [UnitController::class, 'UnitUpdate'])->middleware('auth:sanctum');
Route::post("delete-unit", [UnitController::class, 'UnitDelete'])->middleware('auth:sanctum');

// Unit Api Route End




//Supriler  Api Route Start

Route::get("/supriler-list", [SuprilerController::class, 'SuprilerList'])->middleware('auth:sanctum');
Route::post("/create-supriler", [SuprilerController::class, 'SuprilerCreate'])->middleware('auth:sanctum');
Route::post("/supriler-by-id", [SuprilerController::class, 'SuprilerByID'])->middleware('auth:sanctum');
Route::post("/update-supriler", [SuprilerController::class, 'SuprilerUpdate'])->middleware('auth:sanctum');
Route::post("/delete-supriler", [SuprilerController::class, 'SuprilerDelete'])->middleware('auth:sanctum');

// Supriler Api Route End





//Product  Api Route Start

Route::get('/api/all-products-data-show', [ProductController::class, 'AllProductsDataShow']);


Route::get("/product-list", [ProductController::class, 'ProductList'])->middleware('auth:sanctum');
Route::post("/create-product", [ProductController::class, 'ProductCreate'])->middleware('auth:sanctum');
Route::post("/product-by-id", [ProductController::class, 'ProductByID'])->middleware('auth:sanctum');
Route::post("/update-product", [ProductController::class, 'ProductUpdate'])->middleware('auth:sanctum');
Route::post("/delete-product", [ProductController::class, 'ProductDelete'])->middleware('auth:sanctum');

// Product Api Route End





// Warehouse Api Route Start

Route::get("/warehouse-list", [WarehouseController::class, 'WarehouseList'])->middleware('auth:sanctum');
Route::post("/create-warehouse", [WarehouseController::class, 'WarehouseCreate'])->middleware('auth:sanctum');
Route::post("/warehouse-by-id", [WarehouseController::class, 'WarehouseByID'])->middleware('auth:sanctum');
Route::post("/update-warehouse", [WarehouseController::class, 'WarehouseUpdate'])->middleware('auth:sanctum');
Route::post("/delete-warehouse", [WarehouseController::class, 'WarehouseDelete'])->middleware('auth:sanctum');

// Warehouse Api Route End



// Customer Api Route Start

Route::get("/customer-list", [CustomerController::class, 'CustomerList'])->middleware('auth:sanctum');
Route::post("/create-customer", [CustomerController::class, 'CustomerCreate'])->middleware('auth:sanctum');

// Customer Api Route End



// Purchases Api Route Start

Route::get("/purchases-list", [PurchasesController::class, 'PurchasesList'])->middleware('auth:sanctum');
Route::post("/create-purchases", [PurchasesController::class, 'PurchasesCreate'])->middleware('auth:sanctum');
Route::post("/purchases-by-id", [PurchasesController::class, 'PurchasesByID'])->middleware('auth:sanctum');
Route::post("/update-purchases", [PurchasesController::class, 'PurchasesUpdate'])->middleware('auth:sanctum');
Route::post("/delete-purchases", [PurchasesController::class, 'PurchasesDelete'])->middleware('auth:sanctum');

// Warehouse Api Route End


// Draft Api Route Start

Route::get("/draft-data-list", [DraftController::class, 'DraftDataList'])->middleware('auth:sanctum');
Route::post("/create-draft", [DraftController::class, 'DraftCreate'])->middleware('auth:sanctum');
Route::post("/delete-draft", [DraftController::class, 'DraftInfoDelete'])->middleware('auth:sanctum');


// Draft Api Route End

// order details api Route Start

Route::post("/create-order", [OrderController::class, 'OrderCreate'])->middleware('auth:sanctum');


// order details api Route End

// Dashboard All API Route End
