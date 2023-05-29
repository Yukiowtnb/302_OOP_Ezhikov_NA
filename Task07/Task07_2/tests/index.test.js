import createVector2 from '../src/index.js';
import expect from 'expect';

describe('createVector', () => {
	let v0, v1, v2;

	beforeAll(() => {
		v0 = new createVector2(0, 0, 0);
		v1 = new createVector2(-3, 6, -6);
		v2 = new createVector2(4, -12, 3);
	});

	test('getLength()', () => {
		expect(v0.getLength()).toBe(0);
		expect(v1.getLength()).toBe(9);
		expect(v2.getLength()).toBe(13);
		expect(new createVector2(0, 1, 0).getLength()).toBe(1);
	});

	test('add()', () => {
		expect(v1.add(v2).toString()).toBe('(1;-6;-3)');
		expect(v2.add(v1).toString()).toBe('(1;-6;-3)');
		expect(v1.add(v0).toString()).toBe('(-3;6;-6)');
		expect(v2.add(v0).toString()).toBe('(4;-12;3)');
	});

	test('sub()', () => {
		expect(v1.sub(v0).toString()).toBe(v1.toString());
		expect(v1.sub(v1).toString()).toBe('(0;0;0)');
		expect(v1.sub(v2).toString()).toBe('(-7;18;-9)');
		expect(v2.sub(v1).toString()).toBe('(7;-18;9)');
	});

	test('product()', () => {
		let n = 3;
		expect(v0.product(n).toString()).toBe('(0;0;0)');
		n = -3;
		expect(v0.product(n).toString()).toBe('(0;0;0)');
		n = 0;
		expect(v0.product(n).toString()).toBe('(0;0;0)');
		n = 3;
		expect(v1.product(n).toString()).toBe('(-9;18;-18)');
		n = -3;
		expect(v1.product(n).toString()).toBe('(9;-18;18)');
		n = 0;
		expect(v1.product(n).toString()).toBe('(0;0;0)');
		n = 3;
		expect(v2.product(n).toString()).toBe('(12;-36;9)');
		n = -3;
		expect(v2.product(n).toString()).toBe('(-12;36;-9)');
		n = 0;
		expect(v2.product(n).toString()).toBe('(0;0;0)');
	});

	test('scalarProduct()', () => {
		expect(v1.scalarProduct(v0).toString()).toBe('0');
		expect(v2.scalarProduct(v0).toString()).toBe('0');
		expect(v1.scalarProduct(v2).toString()).toBe('-102');
		expect(v2.scalarProduct(v1).toString()).toBe('-102');
	});

	test('vectorProduct()', () => {
		expect(v1.vectorProduct(v0).toString()).toBe('(0;0;0)');
		expect(v2.vectorProduct(v0).toString()).toBe('(0;0;0)');
		expect(v1.vectorProduct(v2).toString()).toBe('(-54;-15;12)');
		expect(v2.vectorProduct(v1).toString()).toBe('(54;15;-12)');
	});

	test('toString()', () => {
		expect(v0.toString()).toBe('(0;0;0)');
		expect(v1.toString()).toBe('(-3;6;-6)');
		expect(v2.toString()).toBe('(4;-12;3)');
	});
});
