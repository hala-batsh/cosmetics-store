<?php

use Illuminate\Support\Facades\Route;

// =====================================================
// Controllers - المستخدم
// =====================================================

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;


// =====================================================
// Controllers - لوحة تحكم Admin
// =====================================================

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\StatisticsController;


// =====================================================
// الصفحة الرئيسية - المنتجات - التصنيفات - العروض
// =====================================================

// تحويل /home إلى الصفحة الرئيسية مع التحقق من تسجيل الدخول
Route::get('/home', function () {
    return redirect('/');
})->middleware('auth');

// الصفحة الرئيسية للموقع
Route::get('/', [HomeController::class, 'index'])->name('home');

// عرض تفاصيل منتج
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// عرض منتجات تصنيف معين
Route::get('/categories/{id}/products', [CategoryController::class, 'products'])
    ->name('category.products');

// عرض جميع التصنيفات
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

// صفحة عرض طلب المستخدم
Route::get('/view-order', function () {
    return view('user.view-order');
})->name('view.order');

// صفحة العروض
Route::get('/offers', [ProductController::class, 'offers'])
    ->name('offers');


// =====================================================
// تسجيل الدخول - التسجيل - تسجيل الخروج
// =====================================================

// صفحة إنشاء حساب جديد
Route::get('/register', fn() => view('user.register'));

// معالجة إنشاء الحساب
Route::post('/register', [AuthController::class, 'register']);

// صفحة تسجيل الدخول
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

// معالجة تسجيل الدخول
Route::post('/login', [AuthController::class, 'login']);

// تسجيل الخروج
Route::post('/logout', [AuthController::class, 'logout']);


// =====================================================
// عربة التسوق
// =====================================================

// إضافة منتج إلى السلة
Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

// عرض عربة التسوق
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

// حذف منتج من السلة
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

// تحديث كمية المنتج في السلة
Route::post('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

// زيادة كمية المنتج
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

// إنقاص كمية المنتج
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

// الانتقال إلى صفحة الدفع من السلة
Route::get('/cart/checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');


// =====================================================
// الطلبات - إتمام الطلب - نجاح الطلب
// =====================================================

Route::middleware(['auth'])->group(function () {

    // صفحة إتمام الطلب
    Route::get('/checkout', [CartController::class, 'checkout'])
        ->name('checkout');

    // حفظ الطلب
    Route::post('/orders/store', [OrderController::class, 'store'])
        ->name('order.store');

    // صفحة نجاح الطلب
    Route::get('/order-success/{id}', function ($id) {
        return view('user.order-success', compact('id'));
    })->name('order.success');
});


// =====================================================
// طلبات المستخدم
// تحتاج إلى تسجيل الدخول
// =====================================================

Route::middleware(['auth'])->group(function () {

    // عرض جميع طلبات المستخدم
    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    // عرض تفاصيل طلب معين
    Route::get('/orders/{id}', [OrderController::class, 'show'])
        ->name('orders.show');

    // تحديث حالة الطلب
    Route::patch('/orders/{id}/update', [OrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');
});


// =====================================================
// عناوين المستخدم
// تحتاج إلى تسجيل الدخول
// =====================================================

Route::middleware(['auth'])->group(function () {

    // عرض العناوين
    Route::get('/addresses', [AddressController::class, 'index'])
        ->name('addresses.index');

    // صفحة إضافة عنوان جديد
    Route::get('/addresses/create', [AddressController::class, 'create'])
        ->name('addresses.create');

    // حفظ العنوان الجديد
    Route::post('/addresses', [AddressController::class, 'store'])
        ->name('addresses.store');

    // صفحة تعديل عنوان
    Route::get('/addresses/{address}/edit', [AddressController::class, 'edit'])
        ->name('addresses.edit');

    // تحديث العنوان
    Route::put('/addresses/{address}', [AddressController::class, 'update'])
        ->name('addresses.update');

    // حذف العنوان
    Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])
        ->name('addresses.destroy');
});


// =====================================================
// المنتجات - واجهة المستخدم
// =====================================================

// عرض جميع المنتجات
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// عرض تفاصيل منتج معين
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');


// =====================================================
// إدارة المنتجات - Admin
// تحتاج إلى صلاحية Admin
// =====================================================

Route::middleware('admin')->group(function () {

    // صفحة إضافة منتج
    Route::get('/products/create', [ProductController::class, 'create']);

    // حفظ منتج جديد
    Route::post('/products', [ProductController::class, 'store']);

    // صفحة تعديل منتج
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

    // تحديث منتج
    Route::put('/products/{id}', [ProductController::class, 'update']);

    // حذف منتج
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});


// =====================================================
// لوحة تحكم Admin
// تحتاج إلى تسجيل الدخول + صلاحية Admin
// =====================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // =================================================
        // Dashboard
        // =================================================

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        // =================================================
        // إدارة التصنيفات
        // =================================================

        // عرض التصنيفات
        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('categories.index');

        // صفحة إضافة تصنيف
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('categories.create');

        // حفظ تصنيف جديد
        Route::post('/categories', [AdminCategoryController::class, 'store'])
            ->name('categories.store');

        // صفحة تعديل تصنيف
        Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');

        // تحديث التصنيف
        Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])
            ->name('categories.update');

        // حذف التصنيف
        Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])
            ->name('categories.destroy');


        // =================================================
        // إدارة المنتجات
        // =================================================

        // عرض المنتجات في لوحة التحكم
        Route::get('/products', [AdminProductController::class, 'index'])
            ->name('products.index');

        // صفحة إضافة منتج
        Route::get('/products/create', [AdminProductController::class, 'create'])
            ->name('products.create');

        // حفظ منتج جديد
        Route::post('/products', [AdminProductController::class, 'store'])
            ->name('products.store');

        // صفحة تعديل منتج
        Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])
            ->name('products.edit');

        // تحديث المنتج
        Route::put('/products/{id}', [AdminProductController::class, 'update'])
            ->name('products.update');

        // حذف المنتج
        Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])
            ->name('products.destroy');

        // تفعيل / إيقاف المنتج
        Route::post('/products/{id}/toggle-status', [AdminProductController::class, 'toggleStatus'])
            ->name('products.toggleStatus');


        // =================================================
        // إدارة الطلبات - Admin
        // =================================================

        // عرض جميع الطلبات
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        // تحديث حالة الطلب
        Route::post('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        // عرض تفاصيل الطلب
        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])
            ->name('orders.show');
    });


// =====================================================
// إحصائيات لوحة التحكم
// تحتاج إلى صلاحيات Admin
// =====================================================

Route::get('/admin/statistics', [StatisticsController::class, 'index']);


// =====================================================
// تقييمات المنتجات
// تحتاج إلى تسجيل الدخول
// =====================================================

// إضافة تقييم على منتج
Route::post('/products/{id}/review', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');


// =====================================================
// تغيير لغة الموقع
// =====================================================

// تغيير اللغة وحفظها في Session
Route::get('/lang/{lang}', function ($lang) {

    session(['locale' => $lang]);

    return back();
});
