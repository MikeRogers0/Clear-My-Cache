class CmcinstructionController < ApplicationController
  def index
  	redirect_to :action => 'display', 
  					:cmcplatform_slug => browser.platform, 
  					:cmcplatform_version => '1', # I can't get the platform version right now :(
  					:cmcbrowser_slug => browser.name.downcase, 
  					:cmcbrowser_version => browser.version
  end

  def display
  	cmc_browser = Cmcbrowser.where("slug >= :slug", {slug: params[:cmcbrowser_slug]}).order("ABS(version - #{params[:cmcbrowser_version]} ) ASC").limit(1);

  	@cmc_browser = cmc_browser.first
  end
end
