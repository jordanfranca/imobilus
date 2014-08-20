<?php
	abstract class CRUD {
		public abstract function Create(PDOStatement $objInsert);
		public abstract function Read(PDOStatement $objRead);
		public abstract function Update(PDOStatement $objUpdate);
		public abstract function Delete(PDOStatement $objDelete);
	}