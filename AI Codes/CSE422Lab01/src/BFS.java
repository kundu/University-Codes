import java.util.LinkedList;
import java.util.Queue;

public class BFS extends ALforMap {
	Object source, destination;
	Queue<node> qForward = new LinkedList<node>();
	Queue<node> qBackward = new LinkedList<node>();
	LinkedList<node> savePathForward = new LinkedList<node>();
	LinkedList<node> savePathBackward = new LinkedList<node>();
	node name[];
	int visitedForward[];
	int visitedBackward[];
	int parentForward[];
	int parentBackward[];
	node sourceNode;
	node destinationNode;
	node collision;
	String towards;
	int roadsAndLength = 0;
	boolean f = true, b = true;

	public BFS(Object source, Object destination) {
		this.source = source;
		this.destination = destination;
		sourceNode = getNodeAddress(source);
		destinationNode = getNodeAddress(destination);
		int count = totalNode() + 1;

		name = new node[count];
		visitedForward = new int[count];
		visitedBackward = new int[count];

		parentForward = new int[count];
		parentBackward = new int[count];

		qForward.add(sourceNode);
		qBackward.add(destinationNode);

		visitedForward[getIndex(qForward.peek())] = 1;
		visitedBackward[getIndex(qBackward.peek())] = 1;

		putTheNamesInArray();
		runBFS();
	}

	private void putTheNamesInArray() {
		int i = 1;
		for (node n = head; n != null; n = n.area) {
			name[i++] = n;
		}
	}

	private void runBFS() {
		try {
			while (f & !qForward.isEmpty()) {
				node temp = qForward.poll();
				int index = getIndex(temp);
				for (node n = temp.links; n != null; n = n.linkingArea) {
					if (visitedBackward[getIndex(n.areaZone)] == 1) {
						parentForward[getIndex(n.areaZone)] = index;
						collision = n.areaZone;
						towards = "forward";
						f = false;
						b = false;
						printForward();
						printBackward();
						System.out.println("\n" + "Length: " + roadsAndLength);
						System.out.println("Direction: Forward City: "
								+ collision.element + " #Roads: "
								+ (roadsAndLength - 1));
						break;
					} else if (f & visitedForward[getIndex(n.areaZone)] == 0) {
						visitedForward[getIndex(n.areaZone)] = 1;
						qForward.add(n.areaZone);
						parentForward[getIndex(n.areaZone)] = index;
					}
				}
				if (b & f)
					runBFS2();
			}
		} catch (Exception e) {
			b = false;
			f = false;
			System.err.println(e.toString());
		}

	}

	private void runBFS2() {
		try {
			while (b & !qBackward.isEmpty()) {
				node temp = qBackward.poll();
				int index = getIndex(temp);
				for (node n = temp.links; n != null; n = n.linkingArea) {
					if (visitedForward[getIndex(n.areaZone)] == 1) {
						parentBackward[getIndex(n.areaZone)] = index;
						collision = n.areaZone;
						towards = "backward";
						b = false;
						f = false;
						printForward();
						printBackward();
						System.out.println("\n" + "Length: " + roadsAndLength);
						System.out.println("Direction: Backward City: "
								+ collision.element + " #Roads: "
								+ (roadsAndLength - 1));
						break;
					} else if (b & visitedBackward[getIndex(n.areaZone)] == 0) {
						visitedBackward[getIndex(n.areaZone)] = 1;
						qBackward.add(n.areaZone);
						parentBackward[getIndex(n.areaZone)] = index;
					}
				}
				if (b & f)
					runBFS();
			}
		} catch (Exception e) {
			System.err.println("2 " + e.toString());
		}

	}

	private void printForward() {
		int sourceIndex = getIndex(sourceNode);
		int reverce = getIndex(collision);

		while (sourceIndex != reverce) {
			node myNode = name[parentForward[reverce]];
			savePathForward.add(myNode);
			reverce = getIndex(myNode);
		}

		if (towards == "forward") {
			for (int c = savePathForward.size() - 1; c >= 0; c--) {
				System.out.print(savePathForward.get(c).element + ">");
				roadsAndLength++;
			}
			System.out.print(collision.element);
		} else {
			for (int c = savePathForward.size() - 1; c >= 0; c--) {
				System.out.print(savePathForward.get(c).element + ">");
				roadsAndLength++;
			}
		}
	}

	private void printBackward() {

		int distinationIndex = getIndex(destinationNode);
		int reverce = getIndex(collision);

		while (distinationIndex != reverce) {
			node myNode = name[parentBackward[reverce]];
			savePathBackward.add(myNode);
			reverce = getIndex(myNode);
		}

		if (towards == "backward") {
			System.out.print(collision.element);
			for (int c = 0; c < savePathBackward.size(); c++) {
				System.out.print(">" + savePathBackward.get(c).element);
				roadsAndLength++;
			}
		} else {
			for (int c = 0; c < savePathBackward.size(); c++) {
				System.out.print(">" + savePathBackward.get(c).element);
				roadsAndLength++;
			}
		}

	}

	private int getIndex(node get) {
		int i = 0;
		for (node n = head; n != null; n = n.area) {
			i++;
			if (n.equals(get)) {
				return i;
			}
		}
		return 0;
	}

	private node getNodeAddress(Object get) {
		for (node n = head; n != null; n = n.area) {
			if (n.element.equals(get)) {
				return n;
			}
		}
		return null;
	}
}
