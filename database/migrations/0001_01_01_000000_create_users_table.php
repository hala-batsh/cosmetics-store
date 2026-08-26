<?php

// استيراد الكلاسات اللازمة للمايغريشن
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// إنشاء Migration جديد
return new class extends Migration
{

    /**
     * تشغيل المايغريشن (إنشاء الجداول)
     */
    public function up(): void
    {

        // إنشاء جدول users
        Schema::create('users', function (Blueprint $table) {

            $table->id(); // المفتاح الأساسي للمستخدم

            $table->string('name'); // اسم المستخدم

            $table->string('email')->unique(); // الايميل ويجب أن يكون فريد

            $table->timestamp('email_verified_at')->nullable();
            // وقت تأكيد الايميل (اختياري)

            $table->string('password');
            // كلمة المرور (ستُخزن مشفرة)

            $table->string('mobile_phone')->nullable();
            // رقم الهاتف (اختياري)

            $table->enum('role', ['user', 'admin'])->default('user');
            // نوع المستخدم (admin أو user)

            $table->timestamps();
            // created_at
            // updated_at
        });


        // جدول إعادة تعيين كلمة المرور
        Schema::create('password_reset_tokens', function (Blueprint $table) {

            $table->string('email')->primary();
            // الايميل هو المفتاح الأساسي

            $table->string('token');
            // التوكن الخاص بإعادة التعيين

            $table->timestamp('created_at')->nullable();
            // وقت إنشاء الطلب
        });


        // جدول الجلسات (sessions)
        Schema::create('sessions', function (Blueprint $table) {

            $table->string('id')->primary();
            // id الجلسة

            $table->foreignId('user_id')->nullable()->index();
            // المستخدم المرتبط بالجلسة

            $table->string('ip_address', 45)->nullable();
            // عنوان IP

            $table->text('user_agent')->nullable();
            // معلومات المتصفح

            $table->longText('payload');
            // بيانات الجلسة

            $table->integer('last_activity')->index();
            // آخر نشاط
        });
    }


    /**
     * التراجع عن المايغريشن (حذف الجداول)
     */
    public function down(): void
    {

        Schema::dropIfExists('users');
        // حذف جدول المستخدمين

        Schema::dropIfExists('password_reset_tokens');
        // حذف جدول إعادة تعيين كلمة المرور

        Schema::dropIfExists('sessions');
        // حذف جدول الجلسات
    }
};
