E-Ticaret API Projesi
Bu proje, e-ticaret sistemlerinin temel işlevlerini gerçekleştiren bir RESTful API içerir. API, ürünler, müşteriler ve siparişler gibi temel varlıkların yönetimini sağlar ve siparişlere indirim uygulayan bir mekanizma içerir.

Kurulum
Gereksinimler
PHP 8.3
Composer
Docker
MySQL
Adımlar


Repoyu klonlayın:

git clone git@github.com:uozanozyildirim/Ecom-api-development.git
cd ecom-api
Gerekli bağımlılıkları yükleyin:

composer install
konfigrasyonları yapılandırın:

cp .env.example .env
php artisan key:generate
Docker konteynerlerini başlatın:

docker-compose up --build -d
Veritabanı migrasyonlarını çalıştırın:


php artisan migrate --seed


#API Uç Noktaları

#Siparişler
GET

/api/orders: Tüm siparişleri listeler.

POST

/api/orders: Yeni bir sipariş oluşturur.

DELETE
/api/orders/{id}: Belirli bir siparişi siler.




İndirimler
POST
/api/discounts: Verilen sipariş için indirim hesaplar.




#Mimari ve Sağladığı Olanaklar
Bu proje, modern yazılım mimarileri kullanılarak oluşturulmuştur. Kullanılan başlıca mimari desenler ve sağladığı olanaklar şunlardır:

#CQRS (Command Query Responsibility Segregation)
CQRS deseni, veri işlemlerini (komutları) ve veri sorgulamalarını (sorguları) ayrı ayrı işlemenizi sağlar. Bu desen, veri modellemeyi ve veri manipülasyonunu daha anlaşılır hale getirir ve sistem performansını artırır. Projemizde, siparişlerin oluşturulması ve silinmesi gibi işlemler için komutlar ve bunların işleyicileri oluşturulmuştur.

#DTO (Data Transfer Object)
DTO'lar, veri transferini ve iş mantığını ayrıştırarak, katmanlar arasındaki bağımlılığı azaltır ve kodun okunabilirliğini artırır. Bu projede, ProductDTO ve DiscountDTO sınıfları, ürün ve indirim verilerini taşıyan nesneler olarak kullanılmıştır.

#Repository Design Pattern
Repository deseni, veri erişim katmanını soyutlayarak, veritabanı işlemlerini merkezi bir yerde toplar. Bu desen, veri kaynaklarının yönetimini kolaylaştırır ve test edilebilirliği artırır. Ürün, müşteri ve siparişler için repository sınıfları oluşturulmuştur.

#Chain of Responsibility
Chain of Responsibility deseni, bir isteğin birkaç Handler tarafından sırasıyla işlenmesini sağlar. Bu desen, dinamik ve esnek bir yapı sunar, bu sayede yeni Handler sınıfları eklenebilir veya mevcut Handler sınıfları değiştirilebilir.
İndirim hesaplamaları için bu desen kullanılarak, farklı indirim türlerinin zincirleme şekilde uygulanması sağlanmıştır.

#Factory Design Pattern
Factory Design Pattern, nesne oluşturma sürecini soyutlayarak, istemci kodunu nesne oluşturma ayrıntılarından ayırır. Bu desen, kodun daha esnek ve bakımının kolay olmasını sağlar. Projemizde, indirim hesaplayıcılarının oluşturulması için bu desen kullanılmıştır.

#Abstraction (Soyutlama)
Soyutlama, sistemin karmaşıklığını azaltarak, belirli detayları gizler ve yalnızca gerekli özellikleri ön plana çıkarır.
Projemizde, soyut sınıflar ve arayüzler kullanılarak, çeşitli bileşenlerin esnek ve değiştirilebilir olması sağlanmıştır.
Örneğin, ProductRepositoryInterface ve DiscountHandlerInterface arayüzleri, sistemdeki çeşitli bileşenlerin bağımsız olarak çalışmasını sağlar.

Docker
Docker, uygulamanın bağımlılıklarını ve yapılandırmalarını izole ederek, geliştirme ortamlarının tutarlılığını sağlar. Proje, PHP, MySQL ve Nginx gibi servisleri içeren Docker konteynerleri kullanılarak çalıştırılmaktadır.
