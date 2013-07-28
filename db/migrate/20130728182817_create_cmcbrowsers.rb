class CreateCmcbrowsers < ActiveRecord::Migration
  def change
    create_table :cmcbrowsers do |t|
      t.string :name
      t.string :slug
      t.integer :version
      t.text :howto
      t.integer :cmcplatform_id

      t.timestamps
    end
  end
end
