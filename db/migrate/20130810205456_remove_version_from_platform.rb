class RemoveVersionFromPlatform < ActiveRecord::Migration
  def change
  	remove_column :cmcplatforms, :version
  end
end
