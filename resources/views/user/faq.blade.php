@extends('layouts.app')

@section('title', 'الأسئلة الشائعة')

@section('content')

    <section class="faq-page">

        <!-- Hero -->
        <div class="faq-hero">
            <div class="faq-hero-content">
                <span class="faq-label">FAQ</span>
                <h1>الأسئلة الشائعة</h1>
                <p>
                    كل ما تحتاجين معرفته عن الطلب، الدفع، الشحن، الإرجاع
                    والمنتجات ستجدينه هنا.
                </p>
            </div>
        </div>

        <!-- FAQ Content -->
        <div class="faq-container">

            <div class="faq-intro">
                <span>نحن هنا لمساعدتكِ</span>
                <h2>كيف يمكننا مساعدتكِ؟</h2>
                <p>
                    جمعنا لكِ أكثر الأسئلة التي قد تخطر ببالكِ قبل وبعد شراء منتجاتكِ المفضلة.
                </p>
            </div>

            <!-- الطلب والشراء -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-bag-heart"></i>
                    <h3>الطلب والشراء</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>كيف يمكنني طلب منتج؟</summary>
                        <p>
                            يمكنكِ تصفح المنتجات واختيار المنتج الذي يناسبكِ،
                            ثم إضافته إلى سلة التسوق والانتقال إلى إتمام الطلب
                            وإدخال معلومات التوصيل والدفع.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل أحتاج إلى إنشاء حساب لإتمام الطلب؟</summary>
                        <p>
                            يمكنكِ إتمام طلبكِ وفق الخيارات المتاحة في المتجر،
                            وقد يطلب منكِ إنشاء حساب للاستفادة من بعض الخدمات
                            مثل متابعة الطلبات وحفظ بياناتكِ.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>كيف أعرف أن طلبي تم بنجاح؟</summary>
                        <p>
                            بعد إتمام الطلب ستظهر لكِ رسالة تؤكد نجاح العملية،
                            كما قد تصلكِ رسالة تأكيد حسب وسيلة التواصل المعتمدة في المتجر.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكنني تعديل طلبي بعد إتمامه؟</summary>
                        <p>
                            إذا كنتِ بحاجة إلى تعديل الطلب، تواصلي معنا بأسرع وقت ممكن.
                            إمكانية التعديل تعتمد على حالة الطلب ومرحلة تجهيزه.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكنني إلغاء الطلب؟</summary>
                        <p>
                            نعم، يمكنكِ طلب إلغاء الطلب قبل تجهيزه أو شحنه.
                            يرجى التواصل معنا بأسرع وقت ممكن.
                        </p>
                    </details>

                </div>
            </div>


            <!-- الدفع -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-credit-card"></i>
                    <h3>الدفع</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>ما هي طرق الدفع المتاحة؟</summary>
                        <p>
                            تختلف طرق الدفع المتاحة حسب المتجر والمنطقة.
                            ستظهر لكِ خيارات الدفع المتوفرة أثناء إتمام الطلب.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل الدفع الإلكتروني آمن؟</summary>
                        <p>
                            نحرص على استخدام وسائل دفع موثوقة وآمنة لحماية بيانات العملاء
                            أثناء عملية الدفع.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>ماذا أفعل إذا فشلت عملية الدفع؟</summary>
                        <p>
                            تأكدي من صحة بيانات الدفع وتوفّر الرصيد، ثم حاولي مرة أخرى.
                            إذا استمرت المشكلة، يمكنكِ التواصل مع خدمة العملاء.
                        </p>
                    </details>

                </div>
            </div>


            <!-- الشحن والتوصيل -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-truck"></i>
                    <h3>الشحن والتوصيل</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>كم تستغرق مدة التوصيل؟</summary>
                        <p>
                            تختلف مدة التوصيل حسب المدينة وشركة الشحن.
                            ستظهر تفاصيل التوصيل المتاحة عند إتمام الطلب.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يوجد توصيل إلى جميع المناطق؟</summary>
                        <p>
                            يعتمد ذلك على المناطق التي يغطيها المتجر وشركات التوصيل المتاحة.
                            يمكنكِ معرفة إمكانية التوصيل عند إدخال بيانات العنوان.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكنني تغيير عنوان التوصيل؟</summary>
                        <p>
                            يمكنكِ التواصل معنا في أسرع وقت ممكن لطلب تغيير العنوان،
                            بشرط ألا يكون الطلب قد تم شحنه.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>كيف يمكنني معرفة حالة طلبي؟</summary>
                        <p>
                            يمكنكِ متابعة حالة الطلب من خلال حسابكِ إذا كانت هذه الخدمة متاحة،
                            أو التواصل مع خدمة العملاء للاستفسار عن حالة الطلب.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>ماذا يحدث إذا لم أكن موجودة عند وصول الطلب؟</summary>
                        <p>
                            قد تقوم شركة التوصيل بمحاولة التواصل معكِ أو إعادة جدولة التوصيل،
                            ويعتمد ذلك على سياسة شركة الشحن.
                        </p>
                    </details>

                </div>
            </div>


            <!-- المنتجات -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-stars"></i>
                    <h3>المنتجات</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>هل جميع المنتجات أصلية؟</summary>
                        <p>
                            نحرص على توفير منتجات موثوقة من مصادر معتمدة،
                            ويمكنكِ التواصل معنا إذا كنتِ بحاجة إلى معلومات إضافية
                            حول أي منتج.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>كيف أعرف تفاصيل المنتج قبل الشراء؟</summary>
                        <p>
                            يمكنكِ الدخول إلى صفحة المنتج للاطلاع على اسمه ووصفه
                            وتفاصيله وسعره والصور والمعلومات المتوفرة عنه.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل المنتجات مناسبة لجميع أنواع البشرة؟</summary>
                        <p>
                            تختلف المنتجات وخصائصها من منتج لآخر.
                            ننصحكِ بقراءة وصف المنتج ومكوناته قبل الشراء،
                            واختيار ما يناسب احتياجاتكِ.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>كيف أعرف درجة اللون المناسبة لي؟</summary>
                        <p>
                            يمكنكِ مراجعة صور المنتج ووصفه ودرجات الألوان المتوفرة.
                            وقد يختلف ظهور اللون حسب الإضاءة والشاشة.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>ماذا أفعل إذا كان المنتج غير متوفر؟</summary>
                        <p>
                            يمكنكِ متابعة المتجر لمعرفة موعد توفر المنتج من جديد،
                            أو التواصل معنا للاستفسار عن توفره.
                        </p>
                    </details>

                </div>
            </div>


            <!-- العروض والخصومات -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-percent"></i>
                    <h3>العروض والخصومات</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>كيف يمكنني معرفة العروض الحالية؟</summary>
                        <p>
                            يمكنكِ زيارة قسم العروض في المتجر للاطلاع على المنتجات
                            والخصومات المتاحة حالياً.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكن استخدام أكثر من خصم في الطلب نفسه؟</summary>
                        <p>
                            يعتمد ذلك على شروط كل عرض أو رمز خصم.
                            يرجى مراجعة شروط العرض قبل استخدامه.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>ماذا أفعل إذا لم يعمل رمز الخصم؟</summary>
                        <p>
                            تأكدي من كتابة الرمز بشكل صحيح ومن أن العرض ما زال سارياً
                            وأن شروط استخدامه متوفرة.
                        </p>
                    </details>

                </div>
            </div>


            <!-- الإرجاع والاستبدال -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-arrow-repeat"></i>
                    <h3>الإرجاع والاستبدال</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>هل يمكنني إرجاع المنتج؟</summary>
                        <p>
                            تعتمد إمكانية الإرجاع على سياسة المتجر ونوع المنتج وحالته.
                            يرجى التواصل معنا قبل إعادة أي منتج لمعرفة الشروط والإجراءات.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكن استبدال المنتج؟</summary>
                        <p>
                            يمكن طلب الاستبدال وفق الشروط المعتمدة في سياسة المتجر
                            وحالة المنتج.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكن إرجاع مستحضرات التجميل بعد فتحها؟</summary>
                        <p>
                            حفاظاً على السلامة والنظافة، قد تكون بعض منتجات التجميل
                            غير قابلة للإرجاع أو الاستبدال بعد فتحها أو استخدامها.
                            يرجى مراجعة سياسة الإرجاع الخاصة بالمتجر.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>وصلني منتج تالف أو مختلف عن طلبي، ماذا أفعل؟</summary>
                        <p>
                            تواصلي معنا في أقرب وقت وأرسلي تفاصيل المشكلة والصور المطلوبة،
                            وسنعمل على مساعدتكِ وحل المشكلة وفق سياسة المتجر.
                        </p>
                    </details>

                </div>
            </div>


            <!-- الحساب -->
            <div class="faq-category">
                <div class="faq-category-title">
                    <i class="bi bi-person-circle"></i>
                    <h3>الحساب</h3>
                </div>

                <div class="faq-list">

                    <details class="faq-item">
                        <summary>نسيت كلمة المرور، ماذا أفعل؟</summary>
                        <p>
                            يمكنكِ استخدام خيار "نسيت كلمة المرور" من صفحة تسجيل الدخول
                            واتباع التعليمات لإعادة تعيين كلمة المرور.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>هل يمكنني تعديل معلومات حسابي؟</summary>
                        <p>
                            نعم، يمكنكِ تعديل بيانات حسابكِ من صفحة الحساب
                            إذا كانت هذه الخاصية متاحة.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>كيف يمكنني حذف حسابي؟</summary>
                        <p>
                            يمكنكِ التواصل مع خدمة العملاء لطلب حذف الحساب
                            ومعرفة الإجراءات المتاحة.
                        </p>
                    </details>

                </div>
            </div>


            <!-- التواصل -->
            <div class="faq-contact">

                <div class="faq-contact-icon">
                    <i class="bi bi-chat-heart"></i>
                </div>

                <div>
                    <span>لم تجدي إجابة سؤالكِ؟</span>
                    <h3>نحن هنا لمساعدتكِ</h3>
                    <p>
                        تواصلي معنا وسنكون سعداء بالإجابة عن استفساركِ.
                    </p>
                </div>

                <a href="{{ route('contact') }}" class="faq-contact-btn">
                    تواصلي معنا
                    <i class="bi bi-arrow-left"></i>
                </a>

            </div>
        </div>


        </div>

        </div>

    </section>

@endsection
