class GraphDataGenerator {
    constructor(colorTo, colorFrom, data, title) {
        this.colorTo = colorTo;
        this.colorFrom = colorFrom;
        this.data = data;
        this.title = title;
    }

    generateColorsArray() {
        this.bgColors = [];
        let step = 1.0 / parseFloat(this.data.length);
        for (let i = 0, t = 0; i < this.data.length; i++, t += step) {
            this.bgColors.push(Color.colorLerp(this.colorFrom, this.colorTo, t).toString());
        }
    }

    getDataset() {
        return {
            label: this.title,
            data: this.data,
            backgroundColor: this.bgColors
        }
    }
}

function generateBarGraph(canvasId, generatorData, xText, yText, lbls, yMin = 0, yMax = 120) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    let ds = [];
    for (let i = 0; i < generatorData.length; i++) {
        generatorData[i].generateColorsArray();
        ds.push(generatorData[i].getDataset());
    }
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lbls,
            datasets: ds
        },
        options: {
            scales: {
                y: {
                    min: yMin,
                    max: yMax,
                    title: {
                        display: true,
                        text: yText,
                        color: '#000',
                        font: {
                            family: 'Lato',
                            size: 20,
                            weight: 'bold',
                            lineHeight: 1.2,

                        },
                        padding: {
                            top: 20,
                            left: 0,
                            right: 0,
                            bottom: 0
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: xText,
                        color: '#000',
                        font: {
                            family: 'Lato',
                            size: 20,
                            weight: 'bold',
                            lineHeight: 1.2,

                        },
                        padding: {
                            top: 20,
                            left: 0,
                            right: 0,
                            bottom: 0
                        }
                    }
                }
            }
        }
    });
}