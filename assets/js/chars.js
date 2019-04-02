$(document).ready(function () {
	Highcharts.chart('chart_line', {

		title: {
			text: 'Solar Employment Growth by Sector, 2010-2016'
		},

		subtitle: {
			text: 'Source: thesolarfoundation.com'
		},

		yAxis: {
			title: {
				text: 'Number of Employees'
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},

		plotOptions: {
			series: {
				label: {
					connectorAllowed: false
				},
				pointStart: 2010
			}
		},

		series: [{
			name: 'Installation',
			data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
		}, {
			name: 'Manufacturing',
			data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
		}, {
			name: 'Sales & Distribution',
			data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
		}, {
			name: 'Project Development',
			data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
		}, {
			name: 'Other',
			data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
		}],

		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						layout: 'horizontal',
						align: 'center',
						verticalAlign: 'bottom'
					}
				}
			}]
		}

	});

	Highcharts.chart('basic_bar', {
		chart: {
			type: 'bar'
		},
		title: {
			text: 'Historic World Population by Region'
		},
		subtitle: {
			text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
		},
		xAxis: {
			categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
			title: {
				text: null
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Population (millions)',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ' millions'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 80,
			floating: true,
			borderWidth: 1,
			backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
			shadow: true
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Year 1800',
			data: [107, 31, 635, 203, 2]
		}, {
			name: 'Year 1900',
			data: [133, 156, 947, 408, 6]
		}, {
			name: 'Year 2000',
			data: [814, 841, 3714, 727, 31]
		}, {
			name: 'Year 2016',
			data: [1216, 1001, 4436, 738, 40]
		}]
	});

	Highcharts.chart('stacked_bar', {
		chart: {
			type: 'bar'
		},
		title: {
			text: 'Stacked bar chart'
		},
		xAxis: {
			categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total fruit consumption'
			}
		},
		legend: {
			reversed: true
		},
		plotOptions: {
			series: {
				stacking: 'normal'
			}
		},
		series: [{
			name: 'John',
			data: [5, 3, 4, 7, 2]
		}, {
			name: 'Jane',
			data: [2, 2, 3, 2, 1]
		}, {
			name: 'Joe',
			data: [3, 4, 4, 2, 5]
		}]
	});

	Highcharts.chart('pier_chart', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Browser market shares in January, 2018'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		series: [{
			name: 'Brands',
			colorByPoint: true,
			data: [{
				name: 'Chrome',
				y: 61.41,
				sliced: true,
				selected: true
			}, {
				name: 'Internet Explorer',
				y: 11.84
			}, {
				name: 'Firefox',
				y: 10.85
			}, {
				name: 'Edge',
				y: 4.67
			}, {
				name: 'Safari',
				y: 4.18
			}, {
				name: 'Sogou Explorer',
				y: 1.64
			}, {
				name: 'Opera',
				y: 1.6
			}, {
				name: 'QQ',
				y: 1.2
			}, {
				name: 'Other',
				y: 2.61
			}]
		}]
	});

	Highcharts.chart('bubble_chart', {

		chart: {
			type: 'bubble',
			plotBorderWidth: 1,
			zoomType: 'xy'
		},

		legend: {
			enabled: false
		},

		title: {
			text: 'Sugar and fat intake per country'
		},

		subtitle: {
			text: 'Source: <a href="http://www.euromonitor.com/">Euromonitor</a> and <a href="https://data.oecd.org/">OECD</a>'
		},

		xAxis: {
			gridLineWidth: 1,
			title: {
				text: 'Daily fat intake'
			},
			labels: {
				format: '{value} gr'
			},
			plotLines: [{
				color: 'black',
				dashStyle: 'dot',
				width: 2,
				value: 65,
				label: {
					rotation: 0,
					y: 15,
					style: {
						fontStyle: 'italic'
					},
					text: 'Safe fat intake 65g/day'
				},
				zIndex: 3
			}]
		},

		yAxis: {
			startOnTick: false,
			endOnTick: false,
			title: {
				text: 'Daily sugar intake'
			},
			labels: {
				format: '{value} gr'
			},
			maxPadding: 0.2,
			plotLines: [{
				color: 'black',
				dashStyle: 'dot',
				width: 2,
				value: 50,
				label: {
					align: 'right',
					style: {
						fontStyle: 'italic'
					},
					text: 'Safe sugar intake 50g/day',
					x: -10
				},
				zIndex: 3
			}]
		},

		tooltip: {
			useHTML: true,
			headerFormat: '<table>',
			pointFormat: '<tr><th colspan="2"><h3>{point.country}</h3></th></tr>' +
				'<tr><th>Fat intake:</th><td>{point.x}g</td></tr>' +
				'<tr><th>Sugar intake:</th><td>{point.y}g</td></tr>' +
				'<tr><th>Obesity (adults):</th><td>{point.z}%</td></tr>',
			footerFormat: '</table>',
			followPointer: true
		},

		plotOptions: {
			series: {
				dataLabels: {
					enabled: true,
					format: '{point.name}'
				}
			}
		},

		series: [{
			data: [
				{x: 95, y: 95, z: 13.8, name: 'BE', country: 'Belgium'},
				{x: 86.5, y: 102.9, z: 14.7, name: 'DE', country: 'Germany'},
				{x: 80.8, y: 91.5, z: 15.8, name: 'FI', country: 'Finland'},
				{x: 80.4, y: 102.5, z: 12, name: 'NL', country: 'Netherlands'},
				{x: 80.3, y: 86.1, z: 11.8, name: 'SE', country: 'Sweden'},
				{x: 78.4, y: 70.1, z: 16.6, name: 'ES', country: 'Spain'},
				{x: 74.2, y: 68.5, z: 14.5, name: 'FR', country: 'France'},
				{x: 73.5, y: 83.1, z: 10, name: 'NO', country: 'Norway'},
				{x: 71, y: 93.2, z: 24.7, name: 'UK', country: 'United Kingdom'},
				{x: 69.2, y: 57.6, z: 10.4, name: 'IT', country: 'Italy'},
				{x: 68.6, y: 20, z: 16, name: 'RU', country: 'Russia'},
				{x: 65.5, y: 126.4, z: 35.3, name: 'US', country: 'United States'},
				{x: 65.4, y: 50.8, z: 28.5, name: 'HU', country: 'Hungary'},
				{x: 63.4, y: 51.8, z: 15.4, name: 'PT', country: 'Portugal'},
				{x: 64, y: 82.9, z: 31.3, name: 'NZ', country: 'New Zealand'}
			]
		}]

	});

	Highcharts.chart('boxplot_chart', {

		chart: {
			type: 'boxplot'
		},

		title: {
			text: 'Highcharts Box Plot Example'
		},

		legend: {
			enabled: false
		},

		xAxis: {
			categories: ['1', '2', '3', '4', '5'],
			title: {
				text: 'Experiment No.'
			}
		},

		yAxis: {
			title: {
				text: 'Observations'
			},
			plotLines: [{
				value: 932,
				color: 'red',
				width: 1,
				label: {
					text: 'Theoretical mean: 932',
					align: 'center',
					style: {
						color: 'gray'
					}
				}
			}]
		},

		series: [{
			name: 'Observations',
			data: [
				[760, 801, 848, 895, 965],
				[733, 853, 939, 980, 1080],
				[714, 762, 817, 870, 918],
				[724, 802, 806, 871, 950],
				[834, 836, 864, 882, 910]
			],
			tooltip: {
				headerFormat: '<em>Experiment No {point.key}</em><br/>'
			}
		}, {
			name: 'Outlier',
			color: Highcharts.getOptions().colors[0],
			type: 'scatter',
			data: [ // x, y positions where 0 is the first category
				[0, 644],
				[4, 718],
				[4, 951],
				[4, 969]
			],
			marker: {
				fillColor: 'white',
				lineWidth: 1,
				lineColor: Highcharts.getOptions().colors[0]
			},
			tooltip: {
				pointFormat: 'Observation: {point.y}'
			}
		}]

	});

	Highcharts.chart('funnel_chart', {
		chart: {
			type: 'funnel'
		},
		title: {
			text: 'Sales funnel'
		},
		plotOptions: {
			series: {
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b> ({point.y:,.0f})',
					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
					softConnector: true
				},
				center: ['40%', '50%'],
				neckWidth: '30%',
				neckHeight: '25%',
				width: '80%'
			}
		},
		legend: {
			enabled: false
		},
		series: [{
			name: 'Unique users',
			data: [
				['Website visits', 15654],
				['Downloads', 4064],
				['Requested price list', 1987],
				['Invoice sent', 976],
				['Finalized', 846]
			]
		}]
	});

});
