class CmcplatformsController < ApplicationController
  before_action :set_cmcplatform, only: [:show, :edit, :update, :destroy]

  # GET /cmcplatforms
  # GET /cmcplatforms.json
  def index
    @cmcplatforms = Cmcplatform.all
  end

  # GET /cmcplatforms/1
  # GET /cmcplatforms/1.json
  def show
  end

  # GET /cmcplatforms/new
  def new
    @cmcplatform = Cmcplatform.new
  end

  # GET /cmcplatforms/1/edit
  def edit
  end

  # POST /cmcplatforms
  # POST /cmcplatforms.json
  def create
    @cmcplatform = Cmcplatform.new(cmcplatform_params)

    respond_to do |format|
      if @cmcplatform.save
        format.html { redirect_to @cmcplatform, notice: 'Cmcplatform was successfully created.' }
        format.json { render action: 'show', status: :created, location: @cmcplatform }
      else
        format.html { render action: 'new' }
        format.json { render json: @cmcplatform.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /cmcplatforms/1
  # PATCH/PUT /cmcplatforms/1.json
  def update
    respond_to do |format|
      if @cmcplatform.update(cmcplatform_params)
        format.html { redirect_to @cmcplatform, notice: 'Cmcplatform was successfully updated.' }
        format.json { head :no_content }
      else
        format.html { render action: 'edit' }
        format.json { render json: @cmcplatform.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /cmcplatforms/1
  # DELETE /cmcplatforms/1.json
  def destroy
    @cmcplatform.destroy
    respond_to do |format|
      format.html { redirect_to cmcplatforms_url }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_cmcplatform
      @cmcplatform = Cmcplatform.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def cmcplatform_params
      params.require(:cmcplatform).permit(:name, :slug, :version, :howto)
    end
end
