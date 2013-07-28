class Cmcbrowser < ActiveRecord::Base
	belongs_to :cmcplatform

	validates_uniqueness_of :name, :scope => [:slug, :version, :cmcplatform_id]
end
