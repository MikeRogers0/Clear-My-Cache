class Cmcbrowser < ActiveRecord::Base
	belongs_to :cmcplatform

	#validates :name, :presence => true, :format => {:with => /^[a-z ]+$/i, :message => 'Must only contain letters and spaces'}

	validates :slug, :presence => true, 
                     :format => {
                     	:with => /\A[a-z\-_]+\z/,
                     	:message => 'Must only be lowercase letters, hyphens and underscores'
                     }
    validates :name, :presence => true, 
                     :format => {
                     	:with => /\A[a-z\- ]+\z/i,
                     	:message => 'Must only be letters, spaces and hyphens'
                     }

	validates_uniqueness_of :name, :scope => [:slug, :version, :cmcplatform_id]
end
