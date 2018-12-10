<?php

      class Migration_Purchase_Record extends CI_Migration {

        public function up() {

          $this->dbforge->add_field(array(

            'eartag_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'unique' => TRUE,
            ),
            'eartag_color' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'gender' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'body_color' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'purchase_date' => array(
              'type' => 'DATE',
            ),
            'purchase_weight' => array(
              'type' => 'INT',
              'constraint' => 11,
              'null' => TRUE,
            ),
            'purchase_amount' => array(
              'type' => 'FLOAT',
              'constraint' => '11,2',
            ),
            'is_castrated' => array(
              'type' => 'VARCHAR',
              'constraint' => 5,
              'null' => TRUE,
            ),
            'status' => array(
              'type' => 'VARCHAR',
              'constraint' => 128,
              'default' => 'active',
            ),
                           
          ));

          $this->dbforge->add_key('purchase_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_purchase_user FOREIGN KEY (`user_id`) REFERENCES User_Account(`user_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_purchase_goat FOREIGN KEY (`eartag_id`) REFERENCES Goat_Profile(`eartag_id`)');          

          $this->dbforge->create_table('purchase_record',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('purchase_record');
        }

      }