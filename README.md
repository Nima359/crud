با تشکر بابت نصب این پکیج

برای نصب این پکیج کافیه تاآدرس زیر را از طریق دستور کامپوزر در روت پروژه اجرا کنید
composer required Nima359/Crud
php artisan vendor:publish --provider=Nima\Crud\CrudServiceProvider --tag=migrations

php artisan migrate

php artisan db:seed --class=Nima\Crud\Database\Seeders\PostSeed
دستور بالا در دیتابیس چد سطر اطلاعات نمایشی و fake ایجاد میکد تا تست کردن را راحت تر کند

پس از نصب لاراول بصورت خودکار فایل ها و کلاس ها را در محل مناسب قرار میهد

برای نصب دستی پروژه

پوشه Crud رو دانلود نمایید
در روت پروژه یک پوشه بنام packages ایجاد نمایید و درون این پوشه یک پوشه دیگر بنام Nima ایجاد نمایید
و درون پوشه Nima پوشه دیگری بنام Crud ایجاد نمایید و پوشه src را که دانلود نموده اید درون این پوشه کپی نمایید
یعنی آدرس پروژه باید مانند زیر باشد
Laravel_root_Project/packages/Nima/Crud/src
دقت نمایید فایل کامپوزر composer باید مربوط به پکیج باید در پوشه Crud قرار داشته باشد

در پوشه config در روت پروژه و فایل app.php در انتهای آرایه providers دستور زیر را قرار دهید
Nima\Crud\CrudServiceProvider::class

پس از قرار دادن دستور بالا در آرایه provider در فایل app.php و پوشه config لازم است تا جدول posts در دیتابیس ساخته شود برای این کار لازم است تا دستور زیر را درکامند لاین ویندوز اجرا نمایید
php artisan migrate

برای انتشار فایل ها هم دستور زیر را اجرا نمایید
php artisan vendor:publish --tag=Nima\Crud\CrudServiceProvider --force

برای گرفتن پست ها بصورت GET آدرس زیر را در مرورگر تایپ نمایید
http://localhost:8000/post
برای سایر متد ها مانند Post و Put  و  Delete هم درون صفحه اصلی لینک هایی قرار داده شده تا کار شما راحت شود و با یک کلیک درخواست های شما انجام شود


برای حذف پکیج هم دستور زیر را در کامند لاین ویندوز تایپ نمایید
composer remove Nima359\Crud_Api


با تشکر

"# crud" 
"# crud" 
