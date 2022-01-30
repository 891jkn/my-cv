const elc = React.createElement;
export default class CircleButton extends React.Component{

    render(){
        return (
            elc('button',{className : 'btn btn-info text-white'},"Click Me")
        )
    }
}
