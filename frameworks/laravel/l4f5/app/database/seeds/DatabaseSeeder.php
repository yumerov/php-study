<?php

class DatabaseSeeder extends Seeder {

	protected $tables = ['Dogs'];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		foreach ($this->tables as $table) {
			$this->call("{$table}TableSeeder");
		}
	}

}
