class Color {
    constructor(r, g, b, a) {
        this.r = r;
        this.g = g;
        this.b = b;
        this.a = a;
    }

    static colorLerp(a, b, t) {
        let c = new Color(255, 255, 255, 255);
        c.r = a.r + (b.r - a.r) * t;
        c.g = a.g + (b.g - a.g) * t;
        c.b = a.b + (b.b - a.b) * t;
        c.a = a.a + (b.a - a.a) * t;
        c.a = c.a / parseFloat(255);
        return c;
    }

    toString() {
        return "rgba(" + this.r + "," + this.g + "," + this.b + "," + this.a + ")";
    }
}