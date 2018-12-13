class HouseForm extends React.Component {
    constructor(){
        super();
        this.state = {
            outputs: [],
            house: null,
            currentStep: -1,
            totalSteps: null,
        };
        this.saveData = this.saveData.bind(this);
        this.goNextStep = this.goNextStep.bind(this);
    }

    getAPIdata(e){
        e.preventDefault();
        $.ajax({
            url: 'https://api.backhoom.com/woningscan-consolidated/prod?referral_code=cf6c19320ec80bb2a25e7d4cd6b03067d7e74dd8&postcode='+$('#inputZip').val()+'&nummer='+$('#inputHousenumber').val()+$('#inputAffix').val()+'&bewoners='+1+'&jaarverbruik_kWh=&jaarverbruik_m3=',
            method: 'GET',
            success: this.saveData,
            error: this.showError
        });
    }

    saveData(e){
        delete e.woningscan.result.inputs;
        this.setState({outputs: e.woningscan.result});
        this.setState({house: e.lookup});
        this.setState({totalSteps: Object.keys(this.state.outputs).length -1});
        this.goNextStep();
    }

    submit(){
      $.ajax({
          url: baseUrl+'/reports',
          method: 'POST',
          data: {
            outputs: this.state.outputs,
            house: this.state.house,
          },
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(e){
            window.location.href = e['url'];
          },
          error: function(e){

          }
      });
    }

    goNextStep(e){
        if(this.state.currentStep > -1){
            e.preventDefault();
            let item = Object.keys(this.state.outputs)[this.state.currentStep];

            let outputs = Object.assign({}, this.state.outputs); //copy
            outputs[item].bezit = e.currentTarget.value; //edit
            this.setState({outputs}); //save
        }
        if(this.state.currentStep == this.state.totalSteps){
          this.submit();
        }
        this.setState({currentStep: this.state.currentStep+1});
    }

    showError(e){
        console.log("Error")
    }

    render() {
        return (

            <div>
                {this.state.currentStep == -1 &&
                    <div className="d-flex row justify-content-center">
                        <div className="form-group d-inline-block  text-left col-lg-2 col-md-3 col-sm-12">
                            <label htmlFor="inputZip">Postcode</label>
                            <input type="text" className="form-control" id="inputZip" placeholder="Postcode" required></input>
                        </div>
                        <div className="form-group d-inline-block text-left col-lg-2 col-md-3 col-sm-12">
                            <label htmlFor="inputHousenumber">Huisnummer</label>
                            <input type="number" className="form-control" id="inputHousenumber" placeholder="Huisnummer" required></input>
                        </div>
                        <div className="form-group d-inline-block text-left col-md-2 col-lg-2 col-sm-12">
                            <label htmlFor="inputAffix">Toevoeging</label>
                            <input type="text" className="form-control" id="inputAffix" placeholder="Toevoeging"></input>
                        </div>
                        <div className="form-group d-inline-block text-left col-lg-3 col-md-3 col-sm-12">
                            <label htmlFor="inputAmount">Beschikbaar bedrag</label>
                            <input type="number" className="form-control" id="inputAmount" placeholder="Bedrag"></input>
                        </div>
                        <button type="submit" className="btn btn-primary btn-green mb-1" onClick={(e) => this.getAPIdata(e)}>DOE DE CHECK →</button>
                    </div>
                }
                {this.state.currentStep > -1 && this.state.currentStep <= this.state.totalSteps &&
                <div className="text-center flex-column">
                    <div className="">
                        <h3 >Heeft u (een) {Object.keys(this.state.outputs)[this.state.currentStep]}?</h3>
                    </div>
                    <br></br>
                    <div className="">
                        <button type="submit" value="ja" className="btn btn-primary btn-green mr-lg-4  col-lg-2 col-md-4 col-sm-6" onClick={(e) => this.goNextStep(e)}>Ja</button>
                        <button type="submit" value="nee" className="btn btn-primary btn-danger ml-lg-4 col-lg-2 col-md-4 col-sm-6" onClick={(e) => this.goNextStep(e)}>Nee</button>
                    </div>
                </div>
                }
            </div>
        );
    }
}

ReactDOM.render(
    <HouseForm />,
    document.getElementById('form-home')
);
