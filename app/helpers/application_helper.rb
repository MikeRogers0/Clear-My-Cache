module ApplicationHelper
	def canonical_link_tag
	  tag(:link, :rel => :canonical, :href => @canonical_url) if @canonical_url
	end

	def body_class
		@body_class if @body_class
	end
end
