public class node implements Comparable<node> {
	public Object element;
	public node area, links, linkingArea, areaZone;
	public double roadExpenss, cost;

	public node(node m, node n, double d) {
		areaZone = m;
		linkingArea = n;
		roadExpenss = d;
	}

	public node(Object elem, node n1, node n2, double d) {
		element = elem;
		area = n1;
		links = n2;
		cost = d;
	}
	
/////////////////////////////////////////////////////////
	
	node qElem;
	double qCost;

	public node(node a, double b) {
		qElem = a;
		qCost = b;
	}

	@Override
	public int compareTo(node o) {
		return (int)qCost-(int)o.qCost;
	}
}
