const vectorSample = {

	getLength : function () {
		return Math.pow(this.x * this.x + this.y * this.y + this.z * this.z, 0.5);
	},

	add : function (secondVector) {
		return createVector(this.x + secondVector.x, this.y + secondVector.y, this.z + secondVector.z);
	},

	sub : function(secondVector) {
		return createVector(this.x - secondVector.x, this.y - secondVector.y, this.z - secondVector.z);
	},

	product : function(number) {
		return createVector(this.x * number, this.y * number, this.z * number);
	},

	scalarProduct : function(secondVector) {
		return this.x * secondVector.x + this.y * secondVector.y + this.z * secondVector.z;
	},

	vectorProduct : function(secondVector) {
		return createVector(
			this.y * secondVector.z - this.z * secondVector.y, this.z * secondVector.x - this.x * secondVector.z, this.x * secondVector.y - this.y * secondVector.x
		);
	},
	toString() {
		return `(${this.x};${this.y};${this.z})`;
	}
};

export default function createVector2(x, y, z) {
	const Vector = { x, y, z };
	Object.setPrototypeOf(Vector, vectorSample);
	return Vector;
}
