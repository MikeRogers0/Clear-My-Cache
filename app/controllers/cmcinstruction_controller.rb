class CmcinstructionController < ApplicationController
  layout "application", except: [:index, :display_all, :contribute]

  def index
    redirect_to :action => 'display', 
  					:cmcplatform_slug => browser.platform.downcase, 
  					:cmcplatform_version => '1', # I can't get the platform version right now :(
  					:cmcbrowser_slug => browser.name.downcase.parameterize, 
  					:cmcbrowser_version => browser.version
  end

  def display
    # Override the default all slug with mac
    if params[:cmcplatform_slug]
      params[:cmcplatform_slug] = 'mac'
    end

  	@cmc_browser = Cmcbrowser.where("slug = :slug", {slug: params[:cmcbrowser_slug]}).order("ABS((#{params[:cmcbrowser_version]} - version)) DESC").limit(1).first;
    @cmc_platform = Cmcplatform.where("slug = :slug", {slug: params[:cmcplatform_slug]}).limit(1).first;

    if @cmc_browser.nil? or @cmc_platform.nil?
      render :file => "public/404.html",  :status => 404
    else
      @canonical_url = display_url(
        :cmcplatform_slug => @cmc_platform.slug, 
        :cmcplatform_version => 1,
        :cmcbrowser_slug => @cmc_browser.slug, 
        :cmcbrowser_version => @cmc_browser.version,
      )

      @body_class = @cmc_platform.slug + " " + @cmc_browser.slug;
    end
  end

  def display_all
    @cmc_browsers = Cmcbrowser.all()
    @cmc_platforms = Cmcplatform.where("slug != :slug", {slug: 'all'})
  end

  def contribute

  end
end
