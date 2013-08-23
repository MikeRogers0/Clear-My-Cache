class FixingRelationships < ActiveRecord::Migration
  def change
  	remove_column :cmcbrowsers, :cmcplatform_id

  	add_column :cmcbrowsers, :cmcplatform_id, :integer, references: :cmcplatforms
  	add_index :cmcbrowsers, :cmcplatform_id
  end
end
