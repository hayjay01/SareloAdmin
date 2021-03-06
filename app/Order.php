<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'total', 'receiver_phone', 'payment_status', 'delivery_instruction', 'user_address_id', 'order_unique_reference', 'payment_method'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function user_address()
    {
    	return $this->belongsTo('App\Models\UserAddress');
    }

    public function order_products()
    {
    	return $this->hasMany('App\Models\OrderProduct');
    }

    public function products()
    {
    	return $this->belongsToMany('App\Models\Product', 'order_products'); //second parameter specifies the pivot table name that links ptoducts with orders
    }
}
// server {
//         listen 80 default_server;
//         listen [::]:80 default_server;

//         # SSL configuration
//         #
//         # listen 443 ssl default_server;
//         # listen [::]:443 ssl default_server;
//         #
//         # Note: You should disable gzip for SSL traffic.
//         # See: https://bugs.debian.org/773332
//         #
//         # Read up on ssl_ciphers to ensure a secure configuration.
//         # See: https://bugs.debian.org/765782
//         #
//         # Self signed certs generated by the ssl-cert package
//         # Don't use them in a production server!
//         #
//         # include snippets/snakeoil.conf;

//         root /var/www/html;

//         # Add index.php to the list if you are using PHP
//         index index.html index.htm index.nginx-debian.html;

//         server_name _;

//         location / {
//                 # First attempt to serve request as file, then
//                 # as directory, then fall back to displaying a 404.
//                 try_files $uri $uri/ =404;
//         }

//         # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
//         #
//         #location ~ \.php$ {
//         #       include snippets/fastcgi-php.conf;
//         #
//         #       # With php7.0-cgi alone:
//         #       fastcgi_pass 127.0.0.1:9000;
//         #       # With php7.0-fpm:
//         #       fastcgi_pass unix:/run/php/php7.0-fpm.sock;
//         #}
