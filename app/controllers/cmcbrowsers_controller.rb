class CmcbrowsersController < ApplicationController
  before_action :set_cmcbrowser, only: [:show, :edit, :update, :destroy]

  # GET /cmcbrowsers
  # GET /cmcbrowsers.json
  def index
    @cmcbrowsers = Cmcbrowser.all
  end

  # GET /cmcbrowsers/1
  # GET /cmcbrowsers/1.json
  def show
  end

  # GET /cmcbrowsers/new
  def new
    @cmcbrowser = Cmcbrowser.new
  end

  # GET /cmcbrowsers/1/edit
  def edit
  end

  # POST /cmcbrowsers
  # POST /cmcbrowsers.json
  def create
    @cmcbrowser = Cmcbrowser.new(cmcbrowser_params)

    respond_to do |format|
      if @cmcbrowser.save
        format.html { redirect_to @cmcbrowser, notice: 'Cmcbrowser was successfully created.' }
        format.json { render action: 'show', status: :created, location: @cmcbrowser }
      else
        format.html { render action: 'new' }
        format.json { render json: @cmcbrowser.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /cmcbrowsers/1
  # PATCH/PUT /cmcbrowsers/1.json
  def update
    respond_to do |format|
      if @cmcbrowser.update(cmcbrowser_params)
        format.html { redirect_to @cmcbrowser, notice: 'Cmcbrowser was successfully updated.' }
        format.json { head :no_content }
      else
        format.html { render action: 'edit' }
        format.json { render json: @cmcbrowser.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /cmcbrowsers/1
  # DELETE /cmcbrowsers/1.json
  def destroy
    @cmcbrowser.destroy
    respond_to do |format|
      format.html { redirect_to cmcbrowsers_url }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_cmcbrowser
      @cmcbrowser = Cmcbrowser.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def cmcbrowser_params
      params.require(:cmcbrowser).permit(:name, :slug, :version, :howto, :cmcplatform_id)
    end
end
