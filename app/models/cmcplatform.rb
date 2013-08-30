class Cmcplatform < ActiveRecord::Base
	has_many :cmcbrowsers, :class_name => 'Cmcbrowser',
    :foreign_key => 'cmcplatform_id'
end
