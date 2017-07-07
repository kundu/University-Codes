import java.util.LinkedList;
import java.util.PriorityQueue;

public class BFS extends ALforMap {
	PriorityQueue<node> q = new PriorityQueue<node>();

	node sourceNode, destinationNode;
	Object source, destination; 
	LinkedList<node> path = new LinkedList<node>();
	
	node name[];
	int visited[];
	int parent[];
	
	public BFS() {
		visited = new int[totalNode() + 1];
		name = new node[totalNode() + 1];
		parent = new int[totalNode() + 1];
		readInput r = new readInput();
		source = r.getSource();
		destination = r.getDestination();
		sourceNode = stringToNode(source);
		destinationNode = stringToNode(destination);
		putTheNamesInArray();
		work();
	}

	private void work() {
		q.add(new node(sourceNode, 0));
		sourceNode.cost = 0;
		double before = 0;
		while (!q.isEmpty()) {
			node temp = q.poll();  
			visited[getIndex(temp.qElem)] = 1;
			for (node n = temp.qElem.links; n != null; n = n.linkingArea) {
				if (visited[getIndex(n.areaZone)] != 1) { 
					before = temp.qCost - temp.qElem.cost; 
					double d = before + n.areaZone.cost + n.roadExpenss;
					if (qContains(n, d)) {

					} else {
						q.add(new node(n.areaZone, d));
						parent[getIndex(n.areaZone)]=getIndex(temp.qElem);
					}
				}
			}
//			qPrint();
		}
		printShortestPath();
	}
	
	private void printShortestPath(){
		System.out.println("\nShortest Path from source "+sourceNode.element+ " to destination "+destinationNode.element+"\n");
		int sourceIndex=getIndex(sourceNode);
		int destinationIndex=getIndex(destinationNode);
		int reverce=destinationIndex;
		while(reverce!=sourceIndex){
			node myNode = name[parent[reverce]];
			path.add(myNode);
			reverce = getIndex(myNode);
		}
		
		for (int c = path.size() - 1; c >= 0; c--) {
			System.out.print(path.get(c).element + ">");
		}
		System.out.print(destinationNode.element);
	}
	
	private boolean qContains(node n, double d) {
		for (node m : q) {
			if (m.qElem.equals(n.areaZone)) {
				if (m.qCost > d) {
					m.qCost = d;
				}
				return true;
			}
		}
		return false;
	}

	private void qPrint() {
		System.err.println("Queue");
		for (node n : q) {
			System.out.println(n.qElem.element);
			System.out.println(n.qCost);
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

	private void putTheNamesInArray() {
		int i = 1;
		for (node n = head; n != null; n = n.area) {
			name[i++] = n;
		}
	}

	private node stringToNode(Object s) {
		for (node n = head; n != null; n = n.area) {
			if (n.element.equals(s)) {
				return n;
			}
		}
		return null;
	}

}
