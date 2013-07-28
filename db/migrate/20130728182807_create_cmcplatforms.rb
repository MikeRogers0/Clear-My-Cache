class CreateCmcplatforms < ActiveRecord::Migration
  def change
    create_table :cmcplatforms do |t|
      t.string :name
      t.string :slug
      t.integer :version
      t.text :howto

      t.timestamps
    end
  end
end
