export default class createVector3 {
	constructor(x, y, z) {
		this.x = x;
		this.y = y;
		this.z = z;
	}

	getLength () {
		return Math.pow(this.x * this.x + this.y * this.y + this.z * this.z, 0.5);
	}

	add (secondVector) {
		return createVector3(this.x + secondVector.x, this.y + secondVector.y, this.z + secondVector.z);
	}

	sub (secondVector) {
		return createVector3(this.x - secondVector.x, this.y - secondVector.y, this.z - secondVector.z);
	}

	product (number) {
		return createVector3(this.x * number, this.y * number, this.z * number);
	}

	scalarProduct (secondVector) {
		return this.x * secondVector.x + this.y * secondVector.y + this.z * secondVector.z;
	}

	vectorProduct (secondVector) {
		return createVector3(
			this.y * secondVector.z - this.z * secondVector.y, this.z * secondVector.x - this.x * secondVector.z, this.x * secondVector.y - this.y * secondVector.x
		);
	}
	toString() {
		return `(${this.x};${this.y};${this.z})`;
	}
}
