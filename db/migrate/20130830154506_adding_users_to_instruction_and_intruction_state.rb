class AddingUsersToInstructionAndIntructionState < ActiveRecord::Migration
  def change
  	# Add the status (pending,published, etc) to the instructions
  	add_column :cmcplatforms, :status, :string
  	add_column :cmcbrowsers, :status, :string

  	# Associate users to the edit and index it.
  	add_column :cmcplatforms, :user_id, :integer
  	add_column :cmcbrowsers, :user_id, :integer

  	add_index :cmcplatforms, :user_id
  	add_index :cmcbrowsers, :user_id
  end
end
