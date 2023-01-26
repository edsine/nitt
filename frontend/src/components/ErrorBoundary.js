import React from "react";
import { Row, Col, Card, CardBody } from "reactstrap";

class ErrorBoundary extends React.Component {
  constructor(props) {
    super(props);
    this.state = { hasError: false };
  }

  static getDerivedStateFromError(error) {
    // Update state so the next render will show the fallback UI.
    return { hasError: true };
  }

  componentDidCatch(error, errorInfo) {
    // You can also log the error to an error reporting service
  }

  render() {
    if (this.state.hasError) {
      // You can render any custom fallback UI
      return (
        <React.Fragment>
          <div className="page-content">
            <Row>
              <Col className="col-12">
                <Card>
                  <CardBody>
                    <h3>Something went wrong.</h3>
                  </CardBody>
                </Card>
              </Col>
            </Row>
          </div>
        </React.Fragment>
      );
    }

    return this.props.children;
  }
}

export default ErrorBoundary;
