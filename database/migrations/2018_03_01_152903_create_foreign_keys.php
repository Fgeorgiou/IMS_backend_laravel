<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('facility_id')->references('id')->on('facilities')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('product_categories')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('sales_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('sales_products', function(Blueprint $table) {
			$table->foreign('sale_id')->references('id')->on('sales')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('orders_products', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('orders_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('order_product_anomalies', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('order_product_anomalies', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_role_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_facility_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_supplier_id_foreign');
		});
		Schema::table('sales_products', function(Blueprint $table) {
			$table->dropForeign('sales_products_product_id_foreign');
		});
		Schema::table('sales_products', function(Blueprint $table) {
			$table->dropForeign('sales_products_sale_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('orders_products', function(Blueprint $table) {
			$table->dropForeign('orders_products_order_id_foreign');
		});
		Schema::table('orders_products', function(Blueprint $table) {
			$table->dropForeign('orders_products_product_id_foreign');
		});
		Schema::table('order_product_anomalies', function(Blueprint $table) {
			$table->dropForeign('order_product_anomalies_order_id_foreign');
		});
		Schema::table('order_product_anomalies', function(Blueprint $table) {
			$table->dropForeign('order_product_anomalies_product_id_foreign');
		});
	}
}