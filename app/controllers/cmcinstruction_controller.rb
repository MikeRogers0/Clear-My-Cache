class CmcinstructionController < ApplicationController
  def index
  	redirect_to :action => 'display', 
  					:cmcplatform_slug => browser.platform, 
  					:cmcplatform_version => '1', # I can't get the platform version right now :(
  					:cmcbrowser_slug => browser.name.downcase, 
  					:cmcbrowser_version => browser.version
  end

  def display
  	@cmc_browser = Cmcbrowser.where("slug >= :slug", {slug: params[:cmcbrowser_slug]}).order("ABS(version - #{params[:cmcbrowser_version]} ) ASC").limit(1).first;
    @cmc_platform = Cmcplatform.where("slug >= :slug", {slug: params[:cmcplatform_slug]}).order("ABS(version - #{params[:cmcplatform_version]} ) ASC").limit(1).first;

    if @cmc_browser.nil? and @cmc_platform.nil?
      render :file => "public/404.html",  :status => 404
    else
      @canonical_url = display_url(
        :cmcplatform_slug => @cmc_platform.slug, 
        :cmcplatform_version => @cmc_platform.version,
        :cmcbrowser_slug => @cmc_browser.slug, 
        :cmcbrowser_version => @cmc_browser.version,
      )
    end
  end
end
