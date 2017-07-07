public class node {
	public Object element;
	public node area, links, linkingArea, areaZone;

	public node(node m, node n) {
		areaZone = m;
		linkingArea = n;
	}

	public node(Object elem, node n1, node n2) {
		element = elem;
		area = n1;
		links = n2;
	}
}
