class HouseForm extends React.Component {
    constructor(){
        super();
        this.state = {
            outputs: [],
            house: null,
            currentStep: 0,
        }
    }
    getAPIdata(){
        //this.setState({currentStep: 1});
    }
    goNextStep(e){
        e.preventDefault();
        this.setState({currentStep: this.currentStep+1});
    }
    render() {
        return (
            <div>
                {this.state.currentStep == 0 &&
                    <form className="py-5">
                        <div className="form-group d-inline-block mr-3 text-left">
                            <label htmlFor="inputZip">Postcode</label>
                            <input type="text" className="form-control" id="inputZip" placeholder="Postcode" required></input>
                        </div>
                        <div className="form-group d-inline-block mr-3 text-left">
                            <label htmlFor="inputHousenumber">Huisnummer</label>
                            <input type="number" className="form-control" id="inputHousenumber" placeholder="Huisnummer" required></input>
                        </div>
                        <div className="form-group d-inline-block mr-3 text-left">
                            <label htmlFor="inputAffix">Toevoeging</label>
                            <input type="text" className="form-control" id="inputAffix" placeholder="Toevoeging"></input>
                        </div>
                        <div className="form-group d-inline-block mr-3 text-left">
                            <label htmlFor="inputAmount">Beschikbaar bedrag</label>
                            <input type="number" className="form-control" id="inputAmount" placeholder="Bedrag"></input>
                        </div>
                        <button type="submit" className="btn btn-primary btn-green mb-1 "onClick={(e) => this.getAPIdata(e)}>DOE DE CHECK →</button>
                    </form>
                }
                {this.state.currentStep > 0 &&
                    <div>
                        <h2>ey man dit is stappenplan</h2>
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