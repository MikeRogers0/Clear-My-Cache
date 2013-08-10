class CreateIndexOnFk < ActiveRecord::Migration
  def change
    add_index :cmcbrowsers, :cmcplatform_id
  end
end
